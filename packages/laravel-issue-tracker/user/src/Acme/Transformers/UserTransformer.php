<?php namespace LaravelIssueTracker\User\Acme\Transformers;

use LaravelIssueTracker\Core\Acme\Transformers\Transformer;

class UserTransformer extends Transformer {

    /**
     * @var ProfileTransformer
     */
    protected $profileTransformer;

    /**
     * UserTransformer constructor.
     * @param ProfileTransformer $profileTransformer
     */
    public function __construct(ProfileTransformer $profileTransformer)
    {
        $this->profileTransformer = $profileTransformer;
    }


    /**
     * @param $user
     * @return mixed
     */
    public function transform($user)
    {
        return [
            'id'       => $user['id'],
            'email'    => $user['email'],
            'password' => $user['password'],
            'api_token' => $user['api_token'],
            'profile'  => $this->profileTransformer->transform($user['profiles']),
        ];
    }
}