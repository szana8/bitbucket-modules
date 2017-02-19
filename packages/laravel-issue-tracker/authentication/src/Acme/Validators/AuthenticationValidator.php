<?php namespace LaravelIssueTracker\Authentication\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class AuthenticationValidator extends Validator
{

    /**
     * @var array
     */
    protected static $rules = [
        'default' => [
            'email' => 'required'
        ]
    ];

}