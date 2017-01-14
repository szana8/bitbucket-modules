<?php namespace LaravelIssueTracker\Authentication\Acme\Services;

use Illuminate\Support\Facades\Input;
use LaravelIssueTracker\Authentication\Acme\Repositories\UserRepository;
use LaravelIssueTracker\Authentication\Acme\Validators\AuthenticationValidator;
use LaravelIssueTracker\Authentication\Acme\Validators\DatabaseAuthValidator;
use LaravelIssueTracker\Authentication\Listeners\AuthenticateUserListener;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;

class DatabaseAuthService
{
    /**
     * @var UserRepository
     */
    protected $user;
    /**
     * @var AuthenticationValidator
     */
    private $databaseAuthValidator;


    /**
     * DatabaseService constructor.
     * @param UserRepository $user
     * @param DatabaseAuthValidator $databaseAuthValidator
     * @internal param AuthenticationValidator $authenticationValidator
     */
    public function __construct(UserRepository $user, DatabaseAuthValidator $databaseAuthValidator)
    {
        $this->user = $user;
        $this->databaseAuthValidator = $databaseAuthValidator;
    }

    /**
     * @param $request
     * @param AuthenticateUserListener $listener
     * @return mixed
     */
    public function authenticate($request)
    {
        if( $this->databaseAuthValidator->isValid(Input::all()) )
        {
            $databaseUser = $this->user->findByEmailAndPassword($request);
            if( isset($databaseUser->id) ) {
                \Auth::loginUsingId($databaseUser->id, true);
                return true;
            }
            return false;
        }

        return $this->databaseAuthValidator->getErrors();
    }

}