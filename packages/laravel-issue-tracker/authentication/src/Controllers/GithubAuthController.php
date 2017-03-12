<?php
namespace LaravelIssueTracker\Authentication\Controllers;

use Illuminate\Http\Request;
use LaravelIssueTracker\Authentication\Acme\Services\GithubAuthService;
use LaravelIssueTracker\Authentication\Controllers\AbstractControllers\AuthenticationController;

/**
 * Class GithubAuthController
 * @package LaravelIssueTracker\Authentication\Controllers
 */
class GithubAuthController extends AuthenticationController
{
    /**
     * @param GithubAuthService $githubAuthService
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(GithubAuthService $githubAuthService, Request $request)
    {
        return $this->authenticate($githubAuthService, $request);
    }

}