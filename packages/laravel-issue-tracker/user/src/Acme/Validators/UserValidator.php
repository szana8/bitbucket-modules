<?php
namespace LaravelIssueTracker\User\Acme\Validators;

use App\User;
use LaravelIssueTracker\Core\Acme\Validators\Validator;

/**
 * Class UserValidator
 * @package LaravelIssueTracker\User\Acme\Validators
 */
class UserValidator extends Validator {

    protected static $rules = [
        'default' => [
            'email' => 'required',
        ],

        'make' => [
            'email' => 'required',
        ],

        'update' => [
            'email' => 'required',
        ]
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