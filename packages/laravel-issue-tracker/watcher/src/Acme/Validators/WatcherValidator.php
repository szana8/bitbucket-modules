<?php namespace LaravelIssueTracker\Watcher\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class WatcherValidator extends Validator {

    protected static $rules = [
        'issue_id' => 'required|integer',
        'user_id'  => 'required|integer',
    ];

}