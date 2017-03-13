<?php
namespace LaravelIssueTracker\Authentication\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

/**
 * Class DatabaseAuthValidator
 * @package LaravelIssueTracker\Authentication\Acme\Validators
 */
class DatabaseAuthValidator extends Validator
{
    /**
     * @var array
     */
    protected static $rules = [
        'default' => [
            'email' => 'required',
            'password' => 'required'
        ],

        'make' => [
            'email' => 'required|unique',
            'password' => 'required'
        ],

        'update' => [
            'email' => 'required',
        ]
    ];

}