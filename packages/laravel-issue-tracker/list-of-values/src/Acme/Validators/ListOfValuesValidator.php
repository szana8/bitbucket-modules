<?php
namespace LaravelIssueTracker\ListOfValues\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

/**
 * Class ListOfValuesValidator
 * @package LaravelIssueTracker\ListOfValues\Acme\Validators
 */
class ListOfValuesValidator extends Validator
{
    /**
     * Rules for the list of value validation.
     */
    protected static $rules = [

        'make' => [
            'name' => 'required|unique:list_of_values',
            'datatype' => 'required',
            'table' => 'required_if:type,1',
            'column' => 'required_if:type,1',
            'lookups' => 'required_if:type,2'
        ],

        'update' => [
            'name' => 'required',
            'datatype' => 'required',
        ],

        'default' => [
            'name' => 'required|unique:list_of_values',
            'datatype' => 'required',
        ]

    ];

    /**
     * Custom messages for the validation.
     */
    protected static $messages = [
        'table.required_if' => 'The :attribute field is required when type is database',
        'column.required_if' => 'The :attribute field is required when type is database'
    ];

}