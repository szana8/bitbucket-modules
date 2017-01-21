<?php namespace LaravelIssueTracker\Project\Events;

use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileWasDestroyed {

    use SerializesModels;

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