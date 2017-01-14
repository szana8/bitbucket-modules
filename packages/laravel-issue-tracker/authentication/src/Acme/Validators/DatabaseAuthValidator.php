<?php namespace LaravelIssueTracker\Authentication\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class DatabaseAuthValidator extends Validator {

    /**
     * @var array
     */
    protected static $rules = [
        'email' => 'required',
        'password' => 'required'
    ];

}