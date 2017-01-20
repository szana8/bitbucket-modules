<?php namespace LaravelIssueModules\Login\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController {

    use ValidatesRequests, AuthenticatesUsers;

    /**
     * Show the login form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check() == 1) {
            return redirect()->to('/');
        }

        return view('login::login');
    }

    /**
     * Do the login process
     * @return array
     */
    public function login(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required',
            'password' => 'required'
        ]);


        if (Auth::check() == 1) {
            $this->logout();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //return redirect()->to('/');
            return ['message' => 'You are logged in!', 'success' => true];
        } else {
            return ['message' => 'Invalid email or password!', 'success' => false];
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