<?php
namespace LaravelIssueTracker\Issue\Policies;

use App\User;
use LaravelIssueTracker\Issue\Models\Issue;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class IssuePolicy
 * @package LaravelIssueTracker\Issue\Policies
 */
class IssuePolicy
{

    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Issue $issue
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
     * @param Issue $issue
     * @return bool
     */
    public function update(User $user, Issue $issue)
    {
        return true;
    }

}