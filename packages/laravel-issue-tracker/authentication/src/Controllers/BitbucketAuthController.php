<?php
namespace LaravelIssueTracker\Authentication\Controllers;

use Illuminate\Http\Request;
use LaravelIssueTracker\Authentication\Acme\Services\BitbucketAuthService;
use LaravelIssueTracker\Authentication\Controllers\AbstractControllers\AuthenticationController;

/**
 * Class BitbucketAuthController
 * @package LaravelIssueTracker\Authentication\Controllers
 */
class BitbucketAuthController extends AuthenticationController
{
    /**
     * @param BitbucketAuthService $bitbucketAuthService
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(BitbucketAuthService $bitbucketAuthService, Request $request)
    {
        return $this->authenticate($bitbucketAuthService, $request);
    }

}