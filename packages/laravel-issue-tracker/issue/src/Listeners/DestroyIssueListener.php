<?php namespace LaravelIssueTracker\Issue\Listeners;

use LaravelIssueTracker\Issue\Events\IssueWasDestroyed;

class DestroyIssueListener {

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
     * @param IssueWasDestroyed $event
     * @return void
     */
    public function handle(IssueWasDestroyed $event)
    {
        var_dump('issue destroyed ' . $event);
    }

}