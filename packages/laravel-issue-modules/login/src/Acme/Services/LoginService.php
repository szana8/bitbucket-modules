<?php namespace LaravelIssueModules\Login\Acme\Services;

use Illuminate\Support\Facades\Auth;
use LaravelIssueModules\Login\Acme\Validators\LoginValidator;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;

class LoginService {

    /**
     * @var LoginValidator
     */
    protected $loginValidator;


    /**
     * LoginService constructor.
     */
    public function __construct(LoginValidator $loginValidator)
    {
        $this->loginValidator = $loginValidator;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function authenticate($request)
    {
        if( $this->loginValidator->isValid($request) )
        {
            return \Response::json(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]), 200);
        }

        return \Response::json($this->loginValidator->getErrors(), 401);
    }
}