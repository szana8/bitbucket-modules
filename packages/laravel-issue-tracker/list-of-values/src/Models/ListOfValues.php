<?php namespace LaravelIssueTracker\ListOfValues\Models;

use App\Modules\ListOfValues\Events\ListOfValueWasCreated;
use App\Modules\ListOfValues\Events\ListOfValueWasDestroyed;
use App\Modules\ListOfValues\Events\ListOfValueWasUpdated;
use Illuminate\Database\Eloquent\Model;

class ListOfValues extends Model {

    /**
     * These fields are mandatory.
     * @var array
     */
    protected $fillable = [
        'name',
        'datatype',
        'table',
        'column',
        'condition',
    ];

    /**
     * We don't want to save the lookups object to this table.
     * @var array
     */
    protected $guarded = [
        'lookups',
    ];

    /**
     * Eloquent model fired events.
     * @var array
     */
    protected $events = [
        'created' => ListOfValueWasCreated::class,
        'updated' => ListOfValueWasUpdated::class,
        'deleted' => ListOfValueWasDestroyed::class
    ];

    /**
     * Join the lookup values eloquent model to this.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lookups()
    {
        return $this->hasMany('\LaravelIssueTracker\ListOfValues\Models\ListOfValuesLookups');
    }

}