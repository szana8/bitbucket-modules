<?php namespace LaravelIssueTracker\Project\Events;

use Illuminate\Queue\SerializesModels;
use LaravelIssueTracker\User\Models\Profile;

class ProfileWasUpdated {

    use SerializesModelss;

    /**
     * @var Profile
     */
    protected $profile;

    /**
     * Create a new event instance.
     *
     * @param Profile $profile
     */
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

}