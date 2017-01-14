<?php namespace LaravelIssueTracker\Authentication\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use LaravelIssueTracker\Authentication\Acme\Services\DatabaseAuthService;
use LaravelIssueTracker\Authentication\Controllers\AbstractControllers\AuthenticationController;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;

class DatabaseAuthController extends AuthenticationController {


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
     * @param BitbucketAuthService $bitbucketAuthService
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