<?php namespace LaravelIssueTracker\ListOfValues\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class ListOfValuesValidator extends Validator {

    protected static $rules = [
        'lov_name' => 'required',
        'lov_type' => 'required'
    ];

}