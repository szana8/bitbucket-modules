<?php
namespace LaravelIssueTracker\Issue\Acme\Transformers;

use LaravelIssueTracker\Core\Acme\Transformers\Transformer;

/**
 * Class IssueTransformer
 * @package LaravelIssueTracker\Issue\Acme\Transformers
 */
class IssueTransformer extends Transformer
{

    /**
     * @param $item
     * @return mixed
     */
    public function transform($item)
    {

        return [
            'id'                     => $item['id'],
            'issue_number'           => $item['issue_number'],
            'issue_type'             => $item['issue_type'],
            'summary'                => $item['summary'],
            'description'            => $item['description'],
            'enviroment'             => $item['enviroment'],
            'priority'               => $item['priority'],
            'score'                  => $item['score'],
            'resolution'             => $item['resolution'],
            'issue_status'           => $item['issue_status'],
            'resolution_date'        => $item['resolution_date'],
            'time_original_estimate' => $item['time_original_estimate'],
            'time_estimate'          => $item['time_estimate'],
            'time_spent'             => $item['time_spent'],
            'workflow_id'            => $item['workflow_id'],
            'created_at'             => $item['created_at'],
            'updated_at'             => $item['updated_at'],
            'assignee'               => [
                'id'    => $item['assignee']['id'],
                'email' => $item['assignee']['email'],
            ],
            'reporter'               => [
                'id'    => $item['reporter']['id'],
                'email' => $item['reporter']['email'],
            ],
        ];
    }
}