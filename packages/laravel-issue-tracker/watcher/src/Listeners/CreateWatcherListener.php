<?php namespace LaravelIssueTracker\Watcher\Listeners;

use LaravelIssueTracker\Watcher\Events\WatcherWasCreated;

class CreateWatcherListener {

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
     * @param WatcherWasCreated $event
     * @return void
     */
    public function handle(WatcherWasCreated $event)
    {
        var_dump('watcher created');
    }

}