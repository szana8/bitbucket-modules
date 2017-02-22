<?php namespace LaravelIssueTracker\ListOfValues\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class ListOfValuesValidator extends Validator
{

    protected static $rules = [
        'make' => [
            'name' => 'required|unique:list_of_values',
            'type' => 'required',
            'table' => 'required_if:type,1',
            'column' => 'required_if:type,1',
            'lookups' => 'required_if:type,2'
        ],
        'update' => [
            'name' => 'required',
            'type' => 'required',
        ],
        'default' => [
            'name' => 'required|unique:list_of_values',
            'type' => 'required',
        ]
    ];

    protected static $messages = [
        'table.required_if' => 'The :attribute field is required when type is database',
        'column.required_if' => 'The :attribute field is required when type is database'
    ];

}