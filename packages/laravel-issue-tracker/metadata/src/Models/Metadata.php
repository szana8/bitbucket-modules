<?php

namespace LaravelIssueTracker\Metadata\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelIssueTracker\Metadata\Events\MetadataWasUpdated;
use LaravelIssueTracker\Metadata\Events\MetadataWasCreated;
use LaravelIssueTracker\Metadata\Events\MetadataWasDestroyed;

class Metadata extends Model {

    /**
     * Table name of the model.
     */
    protected $table = "metadata";

    /**
     * These fields are mandatory.
     */
    protected $fillable = [
        "key",
        "type",
        "value",
        "enabled",
        "description"
    ];

    /**
     * Registered events for this eloquent model.
     */
    protected $events = [
        'created' => MetadataWasCreated::class,
        'updated' => MetadataWasUpdated::class,
        'deleted' => MetadataWasDestroyed::class
    ];

    /**
     * Active metadata scope.
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('enabled', 'Y');
    }

}