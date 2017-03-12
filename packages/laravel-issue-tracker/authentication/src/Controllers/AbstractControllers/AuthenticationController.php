<?php
namespace LaravelIssueTracker\Authentication\Controllers\AbstractControllers;

use Illuminate\Http\Request;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\Authentication\Listeners\AuthenticateUserListener;
use LaravelIssueTracker\Authentication\Acme\Services\AuthenticationService;
use LaravelIssueTracker\Authentication\Acme\Services\AbstractServices\AuthenticationInterface;

/**
 * Class AuthenticationController
 * @package LaravelIssueTracker\Authentication\Controllers\AbstractControllers
 */
abstract class AuthenticationController extends ApiController implements AuthenticateUserListener
{
    /**
     * Authenticate the user.
     *
     * @param AuthenticationInterface $authenticationService
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function authenticate(AuthenticationInterface $authenticationService, Request $request)
    {
        return $authenticationService->execute($request->has('code'), $this);
    }

    /**
     * Redirect the user to the root url.
     *
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userHasLoggedIn($user)
    {
        return redirect('/');
    }

}