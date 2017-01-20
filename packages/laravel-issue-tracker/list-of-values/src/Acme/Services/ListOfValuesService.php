<?php namespace LaravelIssueTracker\ListOfValues\Acme\Services;

use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\ListOfValues\Acme\Validators\ListOfValuesValidator;
use LaravelIssueTracker\ListOfValues\Models\ListOfValues;

class ListOfValuesService {

    /**
     *
     */
    const TYPE_QUERY = 1;

    /**
     *
     */
    const TYPE_LOOKUP = 2;

    /**
     * @var ListOfValuesValidator
     */
    protected $validator;

    /**
     * @var ListOfValuesLookupsService
     */
    protected $listOfValuesLookupsService;

    /**
     * ListOfValuesService constructor.
     * @param ListOfValuesValidator $validator
     * @param ListOfValuesLookupsService $listOfValuesLookupsService
     */
    public function __construct(ListOfValuesValidator $validator, ListOfValuesLookupsService $listOfValuesLookupsService)
    {
        $this->validator = $validator;
        $this->listOfValuesLookupsService = $listOfValuesLookupsService;
    }

    /**
     * @param array $attributes
     * @return mixed|static
     * @throws ValidationException
     */
    public function make(array $attributes)
    {
        if( $this->validator->isValid($attributes) )
        {
            if( $attributes['lov_type'] == self::TYPE_QUERY )
            {
                $listOfValues = ListOfValues::create($attributes);

                event('ListOfValuesWasCreated', $listOfValues);
                return $listOfValues;
            }

            $listOfValues = $this->makeWithLookups($attributes);
            event('ListOfValuesWasCreated', $listOfValues);

            return $listOfValues;
        }

        throw new ValidationException('Exception', $this->validator->getErrors());
    }

    /**
     * @param array $attributes
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function update(array $attributes, $id)
    {
        if( $this->validator->isValid($attributes) )
        {
            $listOfValue = \DB::transaction(function () use ($attributes, $id) {
                $listOfValue = ListOfValues::find($id)->update($attributes);

                if( $attributes['lov_type'] == self::TYPE_LOOKUP )
                    $this->listOfValuesLookupsService->update($attributes['lookups'], '');

                return $listOfValue;
            });

            event('ListOfValuesWasUpdated', $listOfValue);
            return true;
        }

        throw new ValidationException('List of Values validation failed', $this->validator->getErrors());
    }


    public function destroy($id)
    {
        if( ListOfValues::find($id)->exists() )
        {
            $listOfValues = ListOfValues::destroy($id);
            event('ListOfValuesWasDestroyed', $listOfValues);

            return true;
        }

        throw new ValidationException('List of Values does not exist!', '');
    }


    /**
     *
     * @param $attributes
     * @return mixed
     */
    protected function makeWithLookups($attributes)
    {
        $listOfValues = \DB::transaction(function($attributes) use ($attributes) {
            $listOfValues = ListOfValues::create($attributes);
            $attributes['lookups']['list_of_values_id'] = $listOfValues->id;
            $this->listOfValuesLookupsService->make($attributes['lookups']);
        });

        return $listOfValues;
    }

}