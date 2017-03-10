<?php

namespace LaravelIssueTracker\Metadata\Policies;

use Illuminate\Foundation\Auth\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use LaravelIssueTracker\Metadata\Models\Metadata;

class MetadataPolicy {

    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Metadata $metadata
     * @return bool
     */
    public function show(User $user, Metadata $metadata)
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
    public function update(User $user, Metadata $metadata)
    {
        return true;
    }

    /**
     * @param User $user
     * @param Metadata $metadata
     * @return bool
     */
    public function destroy(User $user, Metadata $metadata)
    {
        return true;
    }

}
