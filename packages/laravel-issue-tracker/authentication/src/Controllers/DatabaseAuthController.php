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

        if( $respond === true)
        {
            return $this->respondCreated('User successfully logged in!');
        }
        else
        {
            return $this->setStatusCode(401)->respond($respond);
        }
    }

}