<?php namespace LaravelIssueTracker\Issue\Listeners;

use LaravelIssueTracker\Issue\Events\IssueWasCreated;

class CreateIssueListener {

    /**
     * Create the event listener.
     *
     * @param Mailer $mailer
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param IssueWasCreated $event
     * @return void
     */
    public function handle(IssueWasCreated $event)
    {
        var_dump('issue created');
    }

}