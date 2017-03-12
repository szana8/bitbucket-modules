<?php
namespace App\Acme\Services;

use Illuminate\Support\Facades\Auth;
use App\Acme\Validators\LoginValidator;

/**
 * Class LoginService
 * @package App\Acme\Services
 */
class LoginService
{
    /**
     * @var LoginValidator
     */
    protected $loginValidator;


    /**
     * LoginService constructor.
     * @param LoginValidator $loginValidator
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

        if( $this->loginValidator->isValidForInsert($request) )
        {
            return Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);
        }

        return $this->loginValidator->getErrors();
    }
}