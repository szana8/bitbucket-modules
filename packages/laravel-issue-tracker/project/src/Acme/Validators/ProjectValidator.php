<?php
namespace LaravelIssueTracker\Project\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

/**
 * Class ProjectValidator
 * @package LaravelIssueTracker\Project\Acme\Validators
 */
class ProjectValidator extends Validator {

    protected static $rules = [

        'default' => [
            "name"        => "required|max:100|unique:projects",
            "key"         => "required|max:5|unique:projects",
            "type"        => "required|integer",
            "description" => "required",
            "enabled"     => "required|in:Y,N",
        ],

    ];

}