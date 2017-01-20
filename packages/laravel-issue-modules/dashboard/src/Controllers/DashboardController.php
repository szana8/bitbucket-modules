<?php namespace LaravelIssueModules\Dashboard\Controllers;


use Illuminate\Support\Facades\Auth;

class DashboardController {

    public function index()
    {
        return view('dashboard::index');
    }

}