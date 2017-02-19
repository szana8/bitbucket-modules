<?php namespace App\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class LoginValidator extends Validator {

    /**
     * @var array
     */
    protected static $rules = [
        'default' => [
            'email' => 'required',
            'password' => 'required'
        ]
    ];

}