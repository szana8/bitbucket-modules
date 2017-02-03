<?php namespace LaravelIssueTracker\Issue\Policies;


use Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use LaravelIssueTracker\Issue\Models\Issue;

class IssuePolicy {

    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Metadata $metadata
     * @return bool
     */
    public function show(User $user, Issue $issue)
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
    public function update(User $user, Issue $issue)
    {
        return true;
    }

}