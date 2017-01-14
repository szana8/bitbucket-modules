<?php namespace LaravelIssueTracker\Authentication\Listeners;

interface AuthenticateUserListener {

    /**
     * @param $user
     * @return mixed
     */
    public function userHasLoggedIn($user);

}