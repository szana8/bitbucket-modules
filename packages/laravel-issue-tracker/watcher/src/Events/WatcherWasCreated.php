<?php
namespace LaravelIssueTracker\Watcher\Events;

use Illuminate\Queue\SerializesModels;
use LaravelIssueTracker\Watcher\Models\Watcher;

class WatcherWasCreated {

    use SerializesModels;
    /**
     * @var Watcher
     */
    protected $watcher;

    /**
     * Create a new event instance.
     *
     * @param Watcher $watcher
     */
    public function __construct(Watcher $watcher)
    {
        $this->watcher = $watcher;
    }

}