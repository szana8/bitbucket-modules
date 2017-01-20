<?php namespace LaravelIssueTracker\ListOfValues\Models;

use Illuminate\Database\Eloquent\Model;

class ListOfValues extends Model {

    protected $fillable = [
        'lov_name', 'lov_type', 'lov_source_table', 'lov_column_name', 'codition',
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