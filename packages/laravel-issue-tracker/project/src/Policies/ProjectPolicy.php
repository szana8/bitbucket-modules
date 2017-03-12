<?php
namespace LaravelIssueTracker\Project\Policies;

use LaravelIssueTracker\User\Models\User;
use LaravelIssueTracker\Project\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class ProjectPolicy
 * @package LaravelIssueTracker\Project\Policies
 */
class ProjectPolicy
{

    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Project $project
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
     * @param Project $project
     * @return bool
     */
    public function update(User $user, Project $project)
    {
        return true;
    }
}