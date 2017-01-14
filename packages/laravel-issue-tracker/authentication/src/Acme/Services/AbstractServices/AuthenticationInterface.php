<?php namespace LaravelIssueTracker\Authentication\Acme\Services\AbstractServices;

interface AuthenticationInterface {

    /**
     * @return mixed
     */
    public function getAuthorizationFirst();

    /**
     * @return mixed
     */
    public function getSocialiteUser();
}