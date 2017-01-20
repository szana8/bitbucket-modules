<?php namespace LaravelIssueModules\Login\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use LaravelIssueModules\Login\Acme\Services\LoginService;

class LoginController {

    use ValidatesRequests, AuthenticatesUsers;
    /**
     * @var LoginService
     */
    protected $loginService;

    /**
     * LoginController constructor.
     */
    public function __construct(LoginService $loginService)
    {
        if (Auth::check() == 1)
            return redirect()->to('/');

        $this->loginService = $loginService;
    }


    /**
     * Show the login form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('login::login');
    }

    /**
     * Do the login process
     * @param Request $request
     * @return array
     */
    public function authenticate(Request $request)
    {
        return $this->loginService->authenticate($request->toArray());
    }

    /**
     * Do the logout process.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

}