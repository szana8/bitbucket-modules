<?php namespace LaravelIssueTracker\Issue\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

class IssueValidator extends Validator {

    protected static $rules = [
        'project_id'             => 'required|integer',
        'issue_number'           => 'required|integer',
        'issue_type'             => 'required|max:45',
        'summary'                => 'required|max:255',
        'reporter'               => 'required|integer',
        'assignee'               => 'required|integer',
        'description'            => 'required',
        //'enviroment'             => 'required',
        //'priority'               => 'required|max:255',
        //'score'                  => 'required|max:45',
        //'time_original_estimate' => 'required|integer',
        //'time_estimate'          => 'required|integer',
        'issue_status'           => 'required',
    ];

}