<?php namespace LaravelIssueTracker\User\Models;

trait User {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profiles()
    {
        return $this->hasMany('\LaravelIssueTracker\User\Models\Profile');
    }
}