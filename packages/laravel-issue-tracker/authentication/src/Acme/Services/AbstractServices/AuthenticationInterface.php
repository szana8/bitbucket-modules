<?php
namespace LaravelIssueTracker\Authentication\Acme\Services\AbstractServices;

/**
 * Interface AuthenticationInterface
 * @package LaravelIssueTracker\Authentication\Acme\Services\AbstractServices
 */
interface AuthenticationInterface
{
    /**
     * Authenticate the user with the proper driver.
     *
     * @return mixed
     */
    public function getAuthorizationFirst();

    /**
     * Return the authenticated user.
     *
     * @return mixed
     */
    public function getSocialiteUser();
}