<?php
namespace LaravelIssueTracker\Authentication\Controllers;

use Illuminate\Http\Request;
use LaravelIssueTracker\Authentication\Acme\Services\GoogleAuthService;
use LaravelIssueTracker\Authentication\Controllers\AbstractControllers\AuthenticationController;

/**
 * Class GoogleAuthController
 * @package LaravelIssueTracker\Authentication\Controllers
 */
class GoogleAuthController extends AuthenticationController
{
    /**
     * @param GoogleAuthService $googleAuthService
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(GoogleAuthService $googleAuthService, Request $request)
    {
        return $this->authenticate($googleAuthService, $request);
    }

}