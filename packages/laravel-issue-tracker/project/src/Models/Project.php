<?php
namespace LaravelIssueTracker\Project\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelIssueTracker\Project\Events\ProjectWasUpdated;
use LaravelIssueTracker\Project\Events\ProjectWasCreated;
use LaravelIssueTracker\Project\Events\ProjectWasDestroyed;

/**
 * Class Project
 * @package LaravelIssueTracker\Project\Models
 */
class Project extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'key',
        'type',
        'description',
        'enabled'
    ];

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $events = [
        'created' => ProjectWasCreated::class,
        'updated' => ProjectWasUpdated::class,
        'deleted' => ProjectWasDestroyed::class
    ];

}