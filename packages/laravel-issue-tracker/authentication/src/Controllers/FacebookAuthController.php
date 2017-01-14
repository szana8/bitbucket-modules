<?php namespace LaravelIssueTracker\Authentication\Controllers;

use Illuminate\Http\Request;
use LaravelIssueTracker\Authentication\Acme\Services\FacebookAuthService;
use LaravelIssueTracker\Authentication\Controllers\AbstractControllers\AuthenticationController;

class FacebookAuthController extends AuthenticationController {

    /**
     * @param FacebookAuthService $facebookAuthService
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(FacebookAuthService $facebookAuthService, Request $request)
    {
        return $this->authenticate($facebookAuthService, $request);
    }

}