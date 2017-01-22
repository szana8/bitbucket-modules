<?php namespace LaravelIssueTracker\Issue\Listeners;

use LaravelIssueTracker\Issue\Events\IssueWasUpdated;

class UpdateIssueListener {

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
     * @param IssueWasUpdated $event
     * @return void
     */
    public function handle(IssueWasUpdated $event)
    {
        var_dump('issue updated' . $event);
    }

}