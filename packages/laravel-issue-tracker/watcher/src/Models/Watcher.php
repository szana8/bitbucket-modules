<?php
namespace LaravelIssueTracker\Watcher\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelIssueTracker\Watcher\Events\WatcherWasCreated;
use LaravelIssueTracker\Watcher\Events\WatcherWasDestroyed;
use LaravelIssueTracker\Watcher\Events\WatcherWasUpdated;

/**
 * Class Watcher
 * @package LaravelIssueTracker\Watcher\Models
 */
class Watcher extends Model {

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $events = [
        'created' => WatcherWasCreated::class,
        'updated' => WatcherWasUpdated::class,
        'deleted' => WatcherWasDestroyed::class
    ];

}