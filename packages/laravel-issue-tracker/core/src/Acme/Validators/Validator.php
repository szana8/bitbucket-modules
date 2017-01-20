<?php
namespace LaravelIssueTracker\Core\Acme\Validators;

use Illuminate\Support\Facades\Validator as LaravelIssueTrackerValidator;

abstract class Validator {

    /**
     * @var
     */
    protected $errors;

    /**
     * @param array $attributes
     * @return bool
     */
    public function isValid(array $attributes)
    {
        $validator = LaravelIssueTrackerValidator::make($attributes, static::$rules);

        if($validator->fails())
        {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

}