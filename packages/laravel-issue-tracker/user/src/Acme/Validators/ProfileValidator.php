<?php namespace LaravelIssueTracker\User\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class ProfileValidator extends Validator {

    protected static $rules = [
        'user_id' => 'required',
        'type'    => 'required',
        'name'    => 'required',
    ];

}