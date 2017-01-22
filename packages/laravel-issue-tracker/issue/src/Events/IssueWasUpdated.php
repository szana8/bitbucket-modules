<?php namespace LaravelIssueTracker\Issue\Events;


use Illuminate\Queue\SerializesModels;
use LaravelIssueTracker\Issue\Models\Issue;

class IssueWasUpdated {

    use SerializesModels;

    /**
     * @var issue
     */
    protected $issue;

    /**
     * Create a new event instance.
     *
     * @param Issue $issue
     */
    public function __construct(Issue $issue)
    {
        $this->issue = $issue;
    }

}