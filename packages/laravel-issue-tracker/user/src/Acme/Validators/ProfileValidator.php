<?php
namespace LaravelIssueTracker\User\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

/**
 * Class ProfileValidator
 * @package LaravelIssueTracker\User\Acme\Validators
 */
class ProfileValidator extends Validator {

    protected static $rules = [
        'default' => [
            'user_id' => 'required',
            'type'    => 'required',
            'name'    => 'required',
        ],

        'make' => [
            'user_id' => 'required',
            'type'    => 'required',
            'name'    => 'required',
        ],

        'update' => [
            'user_id' => 'required',
            'type'    => 'required',
            'name'    => 'required',
        ],
    ];

}