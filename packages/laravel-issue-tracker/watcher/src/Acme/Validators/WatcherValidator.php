<?php
namespace LaravelIssueTracker\Watcher\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

/**
 * Class WatcherValidator
 * @package LaravelIssueTracker\Watcher\Acme\Validators
 */
class WatcherValidator extends Validator
{

    /**
     * @var array
     */
    protected static $rules = [
        'default' => [
            'issue_id' => 'required|integer',
            'user_id'  => 'required|integer',
        ],

        'make' => [
            'issue_id' => 'required|integer',
            'user_id'  => 'required|integer',
        ],

        'update' => [
            'issue_id' => 'required|integer',
            'user_id'  => 'required|integer',
        ],
    ];

}