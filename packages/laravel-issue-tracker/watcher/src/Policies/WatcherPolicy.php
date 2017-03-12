<?php
namespace LaravelIssueTracker\Watcher\Policies;

use LaravelIssueTracker\Watcher\Models\Watcher;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class WatcherPolicy
 * @package LaravelIssueTracker\Watcher\Policies
 */
class WatcherPolicy
{

    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Watcher $watcher
     * @return bool
     */
    public function show(User $user, Watcher $watcher)
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
     * @param Watcher $watcher
     * @return bool
     */
    public function update(User $user, Watcher $watcher)
    {
        return true;
    }

}