<?php namespace LaravelIssueTracker\ListOfValues\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class ListOfValuesLookupsValidator extends Validator {

    protected static $rules = [
        'make' => [
            'value' => 'required',
            'list_of_values_id' => 'required|exists:list_of_values,id'
        ],
        'update'  => [
            'value'             => 'required',
            'list_of_values_id' => 'required|exists:list_of_values,id',
        ],
        'default' => [
            'value' => 'required',
        ]
    ];

}