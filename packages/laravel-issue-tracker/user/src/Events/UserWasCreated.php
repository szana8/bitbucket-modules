<?php
namespace LaravelIssueTracker\User\Events;

use Illuminate\Queue\SerializesModels;
use LaravelIssueTracker\User\Models\User;

/**
 * Class UserWasCreated
 * @package LaravelIssueTracker\User\Events
 */
class UserWasCreated
{

    use SerializesModels;

    /**
     * @var Comment
     */
    private $user;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

}