<?php namespace LaravelIssueTracker\ListOfValues\Models;

use Illuminate\Database\Eloquent\Model;

class ListOfValuesLookups extends Model {

    protected $fillable = [
        'value',
        'list_of_values_id',
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listOfValues()
    {
        return $this->belongsTo('\LaravelIssueTracker\ListOfValues\Models\ListOfValues', 'lov_id', 'id');
    }

}