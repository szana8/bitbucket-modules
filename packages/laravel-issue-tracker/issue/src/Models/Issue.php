<?php namespace LaravelIssueTracker\Issue\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model {

    /**
     * @var array
     */
    protected $fillable = [
        'project_id',
        'issue_number',
        'issue_type',
        'summary',
        'reporter',
        'assignee',
        'description',
        //'enviroment',
        //'priority',
        //'score',
        //'time_original_estimate',
        //'time_estimate',
        'issue_status'
    ];

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Join the user table to the issue reporter table by hasOne type.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reporter()
    {
        return $this->hasOne('App\User', 'id', 'reporter_id');
    }


    /**
     * Join the user user table to the issue assignee ny hasOne type.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assignee()
    {
        return $this->hasOne('App\User', 'id', 'assignee_id');
    }


    /**
     * Join the comments table to the issue.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        //return $this->hasMany('App\dao\Comment', 'issue_id', 'id');
    }


    /**
     * Return the watchers list which belongs to the issue.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function watchers()
    {
        //return $this->hasMany('App\dao\WatchIssue', 'sink_node_id', 'id');
    }

    /**
     * Join the attachments table to the issue.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments()
    {
        //return $this->hasMany('App\dao\FileAttachment', 'issue_id', 'id');
    }

    /**
     * oin the attachments table to the issue.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transitions()
    {
        //return $this->hasMany('App\dao\IssueTransition', 'issue_id', 'id');
    }

    /**
     * Add this scope to concat the appropriate attributes.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeConcat($query)
    {
        /*return $query->select([
            '*',
            \DB::raw('CAST(resolution_date AS DATE) AS resolution_date'),
            \DB::raw('CAST(creation_date AS DATE) AS creation_date'),
            \DB::raw('CAST(last_update_date AS DATE) AS last_update_date'),
            \DB::raw('CONCAT(project, "-", issuenumber) AS issuenumber_c')
        ]);*/
    }

}