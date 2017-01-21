<?php namespace LaravelIssueTracker\Project\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

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

}