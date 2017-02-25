<?php
namespace LaravelIssueTracker\Metadata\Listeners;

use LaravelIssueTracker\Metadata\Events\MetadataWasDestroyed;

class DestroyMetadataListener
{

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
     * @param MetadataWasDestroyed $event
     * @return void
     */
    public function handle(MetadataWasDestroyed $event)
    {
        //
    }
}
