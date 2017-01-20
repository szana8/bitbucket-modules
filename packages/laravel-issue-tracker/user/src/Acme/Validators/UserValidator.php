<?php namespace LaravelIssueTracker\User\Acme\Validators;

use LaravelIssueTracker\Core\Acme\Validators\Validator;
use LaravelIssueTracker\User\Models\User;

class UserValidator extends Validator {

    protected static $rules = [
        'email' => 'required',
    ];

    /**
     * @param $email
     * @return mixed
     */
    public function exists($email)
    {
        return User::where('email', $email);
    }

}