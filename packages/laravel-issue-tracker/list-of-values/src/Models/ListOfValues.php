<?php namespace LaravelIssueTracker\ListOfValues\Models;

use Illuminate\Database\Eloquent\Model;

class ListOfValues extends Model {

    protected $fillable = [
        'name', 'type', 'table', 'column', 'condition',
    ];

    protected $guarded = [
        'lookups',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lookups()
    {
        return $this->hasMany('\LaravelIssueTracker\ListOfValues\Models\ListOfValuesLookups');
    }

}