<?php
namespace LaravelIssueTracker\Issue\Events;

use Illuminate\Queue\SerializesModels;
use LaravelIssueTracker\Issue\Models\Issue;

/**
 * Class IssueWasCreated
 * @package LaravelIssueTracker\Issue\Events
 */
class IssueWasCreated
{
    use SerializesModels;

    /**
     * @var Issue
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