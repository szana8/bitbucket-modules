<?php
namespace LaravelIssueTracker\Issue\Acme\Transformers;

use LaravelIssueTracker\Issue\Models\Issue;
use League\Fractal\TransformerAbstract;

/**
 * Class IssueTransformer
 * @package LaravelIssueTracker\Issue\Acme\Transformers
 */
class IssueTransformer extends TransformerAbstract
{

    /**
     * @param Issue $issue
     * @return mixed
     */
    public function transform(Issue $issue)
    {
        return [
            'id'                     => $issue->id,
            'issue_number'           => $issue->issue_number,
            'issue_type'             => $issue->issue_type,
            'summary'                => $issue->summary,
            'description'            => $issue->description,
            'enviroment'             => $issue->enviroment,
            'priority'               => $issue->priority,
            'score'                  => $issue->score,
            'resolution'             => $issue->resolution,
            'issue_status'           => $issue->issue_status,
            'resolution_date'        => $issue->resolution_date,
            'time_original_estimate' => $issue->time_original_estimate,
            'time_estimate'          => $issue->time_estimate,
            'time_spent'             => $issue->time_spent,
            'workflow_id'            => $issue->workflow_id,
            'created_at'             => $issue->created_at,
            'updated_at'             => $issue->updated_at,
            'assignee'               => [
                'id'    => $issue->assignee->id,
                'email' => $issue->assignee->email,
            ],
            'reporter'               => [
                'id'    => $issue->reporter->id,
                'email' => $issue->reporter->email,
            ],
        ];
    }
}
