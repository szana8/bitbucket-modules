<?php
namespace LaravelIssueTracker\Project\Acme\Transformers;

use LaravelIssueTracker\Project\Models\Project;
use League\Fractal\TransformerAbstract;

/**
 * Class ProjectTransformer
 * @package LaravelIssueTracker\Project\Acme\Transformers
 */
class ProjectTransformer extends TransformerAbstract
{

    /**
     * @param Project $project
     * @return mixed
     */
    public function transform(Project $project)
    {
        return $project->toArray();
    }
}