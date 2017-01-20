<?php namespace LaravelIssueTracker\User\Models;

use Illuminate\Support\Facades\Hash;

trait User {

    /**
     * Set the api_token and password before we save the user.
     */
    public static function boot()
    {
        parent::boot();

        // create a event to happen on saving
        static::saving(function ($table)
        {
            //$table->api_token = str_random(60);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profiles()
    {
        return $this->hasMany('\LaravelIssueTracker\User\Models\Profile');
    }
}