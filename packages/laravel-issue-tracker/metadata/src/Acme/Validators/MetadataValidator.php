<?php
namespace LaravelIssueTracker\Metadata\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class MetadataValidator extends Validator
{

    /**
     * Rules for the metadata validation.
     * @var array
     */
    protected static $rules = [

        'make' => [
            'type' => 'required',
            'key' => 'required|unique:metadata',
            'value' => 'required',
            'description' => 'required',
            'enabled' => 'required|in:Y,N'
        ],

        'update' => [
            'type' => 'required',
            'key' => 'required',
            'value' => 'required',
            'description' => 'required',
            'enabled' => 'required|in:Y,N'
        ],

        'default' => [
            'type' => 'required',
            'key' => 'required|unique:metadata',
            'value' => 'required',
            'description' => 'required',
            'enabled' => 'required|in:Y,N'
        ]

    ];

}