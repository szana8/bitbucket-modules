<?php
namespace LaravelIssueTracker\Authentication\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

/**
 * Class AuthenticationValidator
 * @package LaravelIssueTracker\Authentication\Acme\Validators
 */
class AuthenticationValidator extends Validator
{
    /**
     * @var array
     */
    protected static $rules = [
        'default' => [
            'email' => 'required'
        ],

        'make' => [
            'email' => 'required|unique'
        ],

        'update' => [
            'email' => 'required'
        ]
    ];

}