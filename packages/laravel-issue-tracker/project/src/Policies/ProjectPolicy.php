<?php namespace LaravelIssueTracker\Project\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use LaravelIssueTracker\Project\Models\Project;
use LaravelIssueTracker\User\Models\User;

class ProjectPolicy {

    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Metadata $metadata
     * @return bool
     */
    public function show(User $user, Project $project)
    {
        return true;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function store(User $user)
    {
        return true;
    }

    /**
     * @param User $user
     * @param Metadata $metadata
     * @return bool
     */
    public function update(User $user, Project $project)
    {
        return true;
    }
}