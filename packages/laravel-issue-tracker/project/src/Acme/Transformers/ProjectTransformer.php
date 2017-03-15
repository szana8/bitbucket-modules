<?php
namespace LaravelIssueTracker\Project\Acme\Transformers;

use League\Fractal\TransformerAbstract;
use LaravelIssueTracker\Project\Models\Project;

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