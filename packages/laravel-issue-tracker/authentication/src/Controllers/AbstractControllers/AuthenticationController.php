<?php namespace LaravelIssueTracker\Authentication\Controllers\AbstractControllers;

use Illuminate\Http\Request;
use LaravelIssueTracker\Authentication\Acme\Services\AbstractServices\AuthenticationInterface;
use LaravelIssueTracker\Authentication\Acme\Services\AuthenticationService;
use LaravelIssueTracker\Authentication\Listeners\AuthenticateUserListener;
use LaravelIssueTracker\Core\Controller\ApiController;

abstract class AuthenticationController extends ApiController implements AuthenticateUserListener {

    /**
     * @param AuthenticationInterface $authenticationService
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function authenticate(AuthenticationInterface $authenticationService, Request $request)
    {
        return $authenticationService->execute($request->has('code'), $this);
    }

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userHasLoggedIn($user)
    {
        return redirect('/');
    }

}