<?php namespace LaravelIssueTracker\ListOfValues\Acme\Services;


use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\ListOfValues\Acme\Validators\ListOfValuesLookupsValidator;
use LaravelIssueTracker\ListOfValues\Models\ListOfValuesLookups;

class ListOfValuesLookupsService {

    /**
     * @var ListOfValuesLookupsValidator
     */
    protected $validator;

    /**
     * ListOfValuesLookupsService constructor.
     * @param ListOfValuesLookupsValidator $validator
     */
    public function __construct(ListOfValuesLookupsValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param array $attributes
     * @return bool
     * @throws ValidationException
     */
    public function make(array $attributes)
    {
        if( $this->validator->isValid($attributes) )
        {
            dd($attributes);
            $listOfValuesLookup = ListOfValuesLookups::create($attributes);
            event('ListOfValuesLookupsWasCreated', $listOfValuesLookup);

            return true;
        }

        throw new ValidationException('List of values lookup validation failed', $this->validator->getErrors());
    }

    /**
     * @param array $attributes
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function update(array $attributes, $id)
    {
        if( isset($attributes[0]) && is_array($attributes[0]) )
        {
            foreach($attributes as $attribute)
            {
                if( $this->validator->isValid($attribute) )
                {
                    ListOfValuesLookups::updateOrCreate(['id' => $attribute['id']], $attribute);
                }
            }
            event('ListOfValuesLookupsWasUpdated', '');
            return true;
        }
        else
        {
            if( $this->validator->isValid($attributes) )
            {
                $profile = ListOfValuesLookups::updateOrCreate(['id' => $attributes['id']], $attributes);
                event('ListOfValuesLookupsWasUpdated', $profile);

                return true;
            }

            throw new ValidationException('Lookups validation failed', $this->validator->getErrors());
        }

    }

    /**
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function destroy($id)
    {
        if( ListOfValuesLookups::find($id)->exists() )
        {
            $listOfValuesLookup = ListOfValuesLookups::destroy($id);
            event('ListOfValuesLookupWasDestroyed', $listOfValuesLookup);

            return true;
        }

        throw new ValidationException('List of Values Lookup does not exist!', '');
    }

}