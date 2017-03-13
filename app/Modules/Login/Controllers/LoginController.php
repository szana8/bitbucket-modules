<?php namespace App\Modules\Login\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Acme\Services\LoginService;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;


class LoginController extends Controller {

    use ValidatesRequests, AuthenticatesUsers;
    /**
     * @var LoginService
     */
    protected $loginService;

    /**
     * LoginController constructor.
     * @param LoginService $loginService
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
        return view('Login::index');
    }

    /**
     * Do the login process
     * @param Request $request
     * @return array
     */
    public function authenticate(Request $request)
    {
        try
        {
            if ($this->loginService->authenticate($request->toArray()))
                return redirect()->to('/');
        }
        catch(ValidationException $e) {
            return \Response::json(['error' => ['message' => $e->getMessage(), 'errors' => $e->getErrors()]], 500);
        }
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