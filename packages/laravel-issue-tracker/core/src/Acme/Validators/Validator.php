<?php
namespace LaravelIssueTracker\Core\Acme\Validators;

use Illuminate\Support\Facades\Validator as LaravelIssueTrackerValidator;

/**
 * Abstract class for the form attribute validation. All of the API validation class has to be
 * extend from this.
 *
 * Class Validator
 * @package LaravelIssueTracker\Core\Acme\Validators
 */
abstract class Validator {

    /**
     * Errors object
     */
    protected $errors;

    /**
     * Messages array
     */
    protected static $messages = [];


    /**
     * Check the attributes for insert.
     * @param array $attributes
     * @return bool
     */
    public function isValidForInsert(array $attributes)
    {
        return $this->isValid($attributes, 'make');
    }


    /**
     * Check the attributes for update.
     * @param array $attributes
     * @return bool
     */
    public function isValidForUpdate(array $attributes)
    {
        return $this->isValid($attributes, 'update');
    }


    /**
     * Return the errors object
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }


    /**
     * Check the attributes validation
     *
     * @param array $attributes
     * @param String $option
     * @return bool
     */
    protected function isValid(array $attributes, $option = "default")
    {
        $validator = LaravelIssueTrackerValidator::make($attributes, static::$rules[$option], static::$messages);

        if( $validator->fails() )
        {
            // Add the error message to the attribute.
            $this->errors = $validator->messages();

            return false;
        }

        // The attributes are valid
        return true;
    }
}