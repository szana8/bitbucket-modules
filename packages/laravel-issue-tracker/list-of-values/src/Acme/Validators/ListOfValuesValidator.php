<?php namespace LaravelIssueTracker\ListOfValues\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class ListOfValuesValidator extends Validator
{

    protected static $rules = [
        'make' => [
            'name' => 'required|unique:list_of_values',
            'type' => 'required',
            'lov_table' => 'required_if:type,1',
            'lov_column_name' => 'required_if:type,1',
            'lovValues' => 'required_if:type,2'
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
        'lov_table.required_if' => 'The :attribute field is required when type is database',
        'lov_column_name.required_if' => 'The :attribute field is required when type is database'
    ];

}