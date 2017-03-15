<?php
namespace LaravelIssueTracker\Authentication\Controllers;

use Illuminate\Http\Request;
use LaravelIssueTracker\Authentication\Acme\Services\DatabaseAuthService;
use LaravelIssueTracker\Authentication\Controllers\AbstractControllers\AuthenticationController;

/**
 * Class DatabaseAuthController
 * @package LaravelIssueTracker\Authentication\Controllers
 */
class DatabaseAuthController extends AuthenticationController
{
    /**
     * @var DatabaseAuthService
     */
    private $databaseAuthService;

    /**
     * DatabaseAuthController constructor.
     * @param DatabaseAuthService $databaseAuthService
     */
    public function __construct(DatabaseAuthService $databaseAuthService)
    {
        $this->databaseAuthService = $databaseAuthService;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(Request $request)
    {
        $respond = $this->databaseAuthService->authenticate($request);

        if( $respond === true) {
            return response('User successfully logged in!', 201);
        } else {
            return response($respond, 401);
        }
    }

}