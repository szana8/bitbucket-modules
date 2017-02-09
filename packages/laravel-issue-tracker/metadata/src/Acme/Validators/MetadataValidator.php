<?php
namespace LaravelIssueTracker\Metadata\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class MetadataValidator extends Validator {

    protected static $rules = [
        'type'        => 'required',
        'key'         => 'required',
        'value'       => 'required',
        'description' => 'required',
        'enabled'     => 'required|in:Y,N',
    ];

}