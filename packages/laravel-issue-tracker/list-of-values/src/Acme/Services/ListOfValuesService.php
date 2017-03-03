<?php namespace LaravelIssueTracker\ListOfValues\Acme\Services;

use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\ListOfValues\Acme\Validators\ListOfValuesValidator;
use LaravelIssueTracker\ListOfValues\Models\ListOfValues;
use LaravelIssueTracker\ListOfValues\Models\ListOfValuesLookups;

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
        if( $this->validator->isValid($attributes, 'make') )
        {
            if( $attributes['datatype'] == self::TYPE_QUERY )
            {
                $listOfValues = ListOfValues::create($attributes);

                event('ListOfValuesWasCreated', $listOfValues);
                return $listOfValues;
            }

            $listOfValues = $this->makeWithLookups($attributes);
            event('ListOfValuesWasCreated', $listOfValues);

            return $listOfValues;
        }

        throw new ValidationException('List Of Values validation failed', $this->validator->getErrors());
    }

    /**
     * @param array $attributes
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function update(array $attributes, $id)
    {
        if( $this->validator->isValid($attributes, 'update') )
        {
            if ( $attributes['old_datatype'] != $attributes['datatype'] )
            {
                if ( $attributes['datatype'] == self::TYPE_QUERY )
                {
                    return $this->listToTable($attributes, $id);
                }

                return $this->tableToList($attributes, $id);
            }

            if ( $attributes['datatype'] == self::TYPE_QUERY )
                return ListOfValues::find($id)->update($attributes);



            return true;
        }

        throw new ValidationException('List of Values validation failed', $this->validator->getErrors());
    }

    /**
     * @param $id
     * @return bool
     * @throws ValidationException
     */
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
     * Create the lov with lookups.
     * @param $attributes
     * @return mixed
     */
    protected function makeWithLookups($attributes)
    {
        $listOfValues = \DB::transaction(function() use ($attributes) {
            $listOfValues = ListOfValues::create($attributes);
            $listOfValues->lookups()->createMany($attributes['lookups']);
        });

        return $listOfValues;
    }


    /**
     * Migrate the lov from list type to table type.
     * @param $attributes
     * @param $id
     * @return mixed
     */
    protected function listToTable($attributes, $id)
    {
        return \DB::transaction(function () use ($attributes, $id) {

            //First step is to remove all of the values from the lookup table
            ListOfValuesLookups::where('list_of_values_id', $id)->delete();

            //Next step is to update the ListOfValues dao
            ListOfValues::find($id)->update($attributes);

        });

    }


    /**
     * Migrate the lov from table type to list type.
     * @param $attributes
     * @param $id
     * @return mixed
     */
    protected function tableToList($attributes, $id)
    {
        return \DB::transaction(function () use ($attributes, $id) {

            //Get the dao of the given id
            $listOfValues = ListOfValues::find($id);

            //First step is to update the ListOfValues dao
            $listOfValues->update($attributes);

            //Nest step is to add the values to the lookup table
            $listOfValues->lookups()->createMany($attributes['lookups']);

        });

    }

}