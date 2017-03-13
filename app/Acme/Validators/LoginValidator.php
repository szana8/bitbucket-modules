<?php
namespace App\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

/**
 * Class LoginValidator
 * @package App\Acme\Validators
 */
class LoginValidator extends Validator
{
    /**
     * @var array
     */
    protected static $rules = [
        'default' => [
            'email'    => 'required',
            'password' => 'required',
        ],

        'make' => [
            'email'    => 'required',
            'password' => 'required',
        ]

    ];

}