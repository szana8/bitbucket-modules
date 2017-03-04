<?php namespace LaravelIssueTracker\ListOfValues\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class ListOfValuesLookupsValidator extends Validator {

    protected static $rules = [
        'default' => [
            'value' => 'required',
        ],
        'update'  => [
            'value'             => 'required',
            'id'                => 'required',
            'list_of_values_id' => 'required',
        ],
    ];

}