<?php
namespace LaravelIssueTracker\Authentication\Acme\Services\AbstractServices;

use Laravel\Socialite\Contracts\Factory as Socialite;
use LaravelIssueTracker\Authentication\Acme\Repositories\UserRepository;
use LaravelIssueTracker\Authentication\Listeners\AuthenticateUserListener;

/**
 * Class AuthenticationService
 * @package LaravelIssueTracker\Authentication\Acme\Services\AbstractServices
 */
abstract class AuthenticationService
{
    /**
     * @var UserRepository
     */
    protected $user;
    /**
     * @var Socialite
     */
    protected $socialite;

    /**
     * AuthenticationService constructor.
     * @param UserRepository $user
     * @param Socialite $socialite
     */
    public function __construct(UserRepository $user, Socialite $socialite)
    {
        $this->user = $user;
        $this->socialite = $socialite;
    }

    /**
     * @param string $hasCode
     * @param AuthenticateUserListener $listener
     * @return AuthenticateUserListener
     */
    public function execute($hasCode, AuthenticateUserListener $listener)
    {
        if ( ! $hasCode )
        {
            return $this->getAuthorizationFirst();
        }

        $socialUser = $this->user->findByEmailOrCreate($this->getSocialiteUser());

        \Auth::login($socialUser, true);

        return $listener->userHasLoggedIn($socialUser);
    }

}