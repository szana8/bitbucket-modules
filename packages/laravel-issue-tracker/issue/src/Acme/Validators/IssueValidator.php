<?php
namespace LaravelIssueTracker\Issue\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;

/**
 * Class IssueValidator
 * @package LaravelIssueTracker\Issue\Acme\Validators
 */
class IssueValidator extends Validator
{

    /**
     * @var array
     */
    protected static $rules = [
        'default' => [
            'project_id'   => 'required|integer',
            'issue_number' => 'required|integer',
            'issue_type'   => 'required|max:45',
            'summary'      => 'required|max:255',
            'reporter'     => 'required|integer',
            'assignee'     => 'required|integer',
            'description'  => 'required',
            //'enviroment'             => 'required',
            //'priority'               => 'required|max:255',
            //'score'                  => 'required|max:45',
            //'time_original_estimate' => 'required|integer',
            //'time_estimate'          => 'required|integer',
            'issue_status' => 'required',
        ],

        'make' => [
            'project_id'   => 'required|integer',
            'issue_number' => 'required|integer',
            'issue_type'   => 'required|max:45',
            'summary'      => 'required|max:255',
            'reporter'     => 'required|integer',
            'assignee'     => 'required|integer',
            'description'  => 'required',
            //'enviroment'             => 'required',
            //'priority'               => 'required|max:255',
            //'score'                  => 'required|max:45',
            //'time_original_estimate' => 'required|integer',
            //'time_estimate'          => 'required|integer',
            'issue_status' => 'required',
        ],

        'update' => [
            'project_id'   => 'required|integer',
            'issue_number' => 'required|integer',
            'issue_type'   => 'required|max:45',
            'summary'      => 'required|max:255',
            'reporter'     => 'required|integer',
            'assignee'     => 'required|integer',
            'description'  => 'required',
            //'enviroment'             => 'required',
            //'priority'               => 'required|max:255',
            //'score'                  => 'required|max:45',
            //'time_original_estimate' => 'required|integer',
            //'time_estimate'          => 'required|integer',
            'issue_status' => 'required',
        ],
    ];

}