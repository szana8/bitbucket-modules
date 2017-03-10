<?php
namespace LaravelIssueTracker\Metadata\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelIssueTracker\Metadata\Events\MetadataWasCreated;
use LaravelIssueTracker\Metadata\Events\MetadataWasDestroyed;
use LaravelIssueTracker\Metadata\Events\MetadataWasUpdated;

class Metadata extends Model {

    /**
     * Table name of the model.
     * @var string
     */
    protected $table = "metadata";

    /**
     * These fields are mandatory.
     * @var array
     */
    protected $fillable = [
        "type",
        "key",
        "value",
        "description",
        "enabled"
    ];

    /**
     * Registered events for this eloquent model.
     * @var array
     */
    protected $events = [
        'created' => MetadataWasCreated::class,
        'updated' => MetadataWasUpdated::class,
        'deleted' => MetadataWasDestroyed::class
    ];

    /**
     * Active metadata scope.
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('enabled', 'Y');
    }

}