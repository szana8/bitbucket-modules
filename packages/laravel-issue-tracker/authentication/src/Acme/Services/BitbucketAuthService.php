<?php
namespace LaravelIssueTracker\Authentication\Acme\Services;

use Laravel\Socialite\Contracts\Factory as Socialite;
use LaravelIssueTracker\Authentication\Acme\Repositories\UserRepository;
use LaravelIssueTracker\Authentication\Acme\Transformers\BitbucketAuthTransformer;
use LaravelIssueTracker\Authentication\Acme\Services\AbstractServices\AuthenticationService;
use LaravelIssueTracker\Authentication\Acme\Services\AbstractServices\AuthenticationInterface;

/**
 * Class BitbucketAuthService
 * @package LaravelIssueTracker\Authentication\Acme\Services
 */
class BitbucketAuthService extends AuthenticationService implements AuthenticationInterface
{
    /**
     * @var BitbucketAuthTransformer
     */
    protected $bitbucketAuthTransformer;

    /**
     * BitbucketAuthService constructor.
     *
     * @param BitbucketAuthTransformer $bitbucketAuthTransformer
     * @param UserRepository $userRepository
     * @param Socialite $socialiteInterface
     */
    public function __construct(BitbucketAuthTransformer $bitbucketAuthTransformer, UserRepository $userRepository, Socialite $socialiteInterface)
    {
        $this->bitbucketAuthTransformer = $bitbucketAuthTransformer;

        parent::__construct($userRepository, $socialiteInterface);
    }

    /**
     * Authenticate the user with the proper driver.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function getAuthorizationFirst()
    {
        return $this->socialite->driver('bitbucket2')->stateless()->redirect();
    }

    /**
     * Return the authenticated user.
     *
     * @return \Laravel\Socialite\Contracts\User
     */
    public function getSocialiteUser()
    {
        return $this->bitbucketAuthTransformer->transform($this->socialite->driver('bitbucket2')->stateless()->user());
    }

}