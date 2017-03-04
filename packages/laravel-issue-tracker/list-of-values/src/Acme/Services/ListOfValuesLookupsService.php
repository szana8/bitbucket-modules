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
        $listOfValues = \DB::transaction(function() use ($attributes, $id) {
            //
            foreach ( $attributes as $attribute )
            {
                if ($this->validator->isValid($attribute, "update") ) {
                    //Create a record if not exists else return the id of it.
                    $destroy[] = ListOfValuesLookups::firstOrCreate($attribute)->id;
                }
                else {
                    throw new ValidationException('Lookups validation failed', $this->validator->getErrors());
                }
            }

            //Delete the removed attributes from the list.
            ListOfValuesLookups::whereNotIn('id', $destroy)->where('list_of_values_id', $id)->delete();
        });

        return $listOfValues;

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