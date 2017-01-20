<?php namespace LaravelIssueModules\Login\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class LoginValidator extends Validator {

    /**
     * @var array
     */
    protected static $rules = [
        'email' => 'required',
        'password' => 'required'
    ];

}