<?php
namespace LaravelIssueTracker\ListOfValues\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

/**
 * Class ListOfValuesLookupsValidator
 * @package LaravelIssueTracker\ListOfValues\Acme\Validators
 */
class ListOfValuesLookupsValidator extends Validator
{
    /**
     * Rules for the list of value validation.
     */
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