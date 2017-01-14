<?php namespace LaravelIssueModules\Login\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;

class LoginController {

    use ValidatesRequests;

    public function index()
    {
        return view('login::login');
    }

    public function login()
    {
        $this->validate(request(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        return ['message' => 'You are logged in!'];
    }

}