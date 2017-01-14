<?php namespace LaravelIssueTracker\Authentication\Acme\Services;

use Laravel\Socialite\Contracts\Factory as Socialite;
use LaravelIssueTracker\Authentication\Acme\Repositories\UserRepository;
use LaravelIssueTracker\Authentication\Acme\Services\AbstractServices\AuthenticationInterface;
use LaravelIssueTracker\Authentication\Acme\Services\AbstractServices\AuthenticationService;
use LaravelIssueTracker\Authentication\Acme\Transformers\FacebookAuthTransformer;

class FacebookAuthService extends AuthenticationService implements AuthenticationInterface {

    /**
     * @var FacebookAuthTransformer
     */
    protected $facebookAuthTransformer;

    /**
     * FacebookAuthService constructor.
     * @param FacebookAuthTransformer $facebookAuthTransformer
     * @param UserRepository $userRepository
     * @param Socialite $socialiteInterface
     */
    public function __construct(FacebookAuthTransformer $facebookAuthTransformer, UserRepository $userRepository, Socialite $socialiteInterface)
    {
        parent::__construct($userRepository, $socialiteInterface);
        $this->facebookAuthTransformer = $facebookAuthTransformer;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function getAuthorizationFirst()
    {
        return $this->socialite->driver('facebook')->redirect();
    }

    /**
     * @return \Laravel\Socialite\Contracts\User
     */
    public function getSocialiteUser()
    {
        return $this->facebookAuthTransformer->transform($this->socialite->driver('facebook')->user());
    }

}