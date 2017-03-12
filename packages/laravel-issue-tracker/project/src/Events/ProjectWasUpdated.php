<?php
namespace LaravelIssueTracker\Project\Events;

use Illuminate\Queue\SerializesModels;
use LaravelIssueTracker\Project\Models\Project;

class ProjectWasUpdated
{

    use SerializesModels;

    /**
     * @var Project
     */
    protected $project;

    /**
     * Create a new event instance.
     *
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

}