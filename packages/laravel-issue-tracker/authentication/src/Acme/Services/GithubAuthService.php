<?php
namespace LaravelIssueTracker\Authentication\Acme\Services;

use Laravel\Socialite\Contracts\Factory as Socialite;
use LaravelIssueTracker\Authentication\Acme\Repositories\UserRepository;
use LaravelIssueTracker\Authentication\Acme\Transformers\GithubAuthTransformer;
use LaravelIssueTracker\Authentication\Acme\Services\AbstractServices\AuthenticationService;
use LaravelIssueTracker\Authentication\Acme\Services\AbstractServices\AuthenticationInterface;

/**
 * Class GithubAuthService
 * @package LaravelIssueTracker\Authentication\Acme\Services
 */
class GithubAuthService extends AuthenticationService implements AuthenticationInterface
{
    /**
     * @var GithubAuthTransformer
     */
    protected $githubAuthTransformer;

    /**
     * GithubAuthService constructor.
     * @param GithubAuthTransformer $githubAuthTransformer
     * @param UserRepository $userRepository
     * @param Socialite $socialiteInterface
     */
    public function __construct(GithubAuthTransformer $githubAuthTransformer, UserRepository $userRepository, Socialite $socialiteInterface)
    {
        parent::__construct($userRepository, $socialiteInterface);
        $this->githubAuthTransformer = $githubAuthTransformer;
    }

    /**
     * Authenticate the user with the proper driver.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function getAuthorizationFirst()
    {
        return $this->socialite->driver('github')->stateless()->redirect();
    }

    /**
     * Return the authenticated user.
     *
     * @return \Laravel\Socialite\Contracts\User
     */
    public function getSocialiteUser()
    {
        return $this->githubAuthTransformer->transform($this->socialite->driver('github')->stateless()->user());
    }

}