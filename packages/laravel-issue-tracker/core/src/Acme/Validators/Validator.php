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
     * @var
     */
    protected $errors;

    /**
     * Check the attributes validation
     *
     * @param array $attributes
     * @param String $option
     * @return bool
     */
    public function isValid(array $attributes, $option = "default")
    {
        $validator = LaravelIssueTrackerValidator::make($attributes, static::$rules[$option]);

        if($validator->fails())
        {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
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

}