<?php
namespace LaravelIssueTracker\Authentication\Acme\Services;

use Laravel\Socialite\Contracts\Factory as Socialite;
use LaravelIssueTracker\Authentication\Acme\Repositories\UserRepository;
use LaravelIssueTracker\Authentication\Acme\Transformers\GoogleAuthTransformer;
use LaravelIssueTracker\Authentication\Acme\Services\AbstractServices\AuthenticationService;
use LaravelIssueTracker\Authentication\Acme\Services\AbstractServices\AuthenticationInterface;

/**
 * Class GoogleAuthService
 * @package LaravelIssueTracker\Authentication\Acme\Services
 */
class GoogleAuthService extends AuthenticationService implements AuthenticationInterface
{
    /**
     * @var GoogleAuthTransformer
     */
    protected $googleAuthTransformer;

    /**
     * GoogleAuthService constructor.
     * @param GoogleAuthTransformer $googleAuthTransformer
     * @param UserRepository $userRepository
     * @param Socialite $socialiteInterface
     */
    public function __construct(GoogleAuthTransformer $googleAuthTransformer, UserRepository $userRepository, Socialite $socialiteInterface)
    {
        parent::__construct($userRepository, $socialiteInterface);
        $this->googleAuthTransformer = $googleAuthTransformer;
    }

    /**
     * Authenticate the user with the proper driver.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function getAuthorizationFirst()
    {
        return $this->socialite->driver('google')->stateless()->redirect();
    }

    /**
     * Return the authenticated user.
     *
     * @return \stdClass
     */
    public function getSocialiteUser()
    {
        return $this->googleAuthTransformer->transform($this->socialite->driver('google')->stateless()->user());
    }

}