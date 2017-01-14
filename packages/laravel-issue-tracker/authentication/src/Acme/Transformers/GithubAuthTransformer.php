<?php namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use Laravel\Socialite\Contracts\User;
use LaravelIssueTracker\Authentication\Acme\Transformers\SocialiteInterface\SocialiteTransformerInterface;

class GithubAuthTransformer implements SocialiteTransformerInterface {

    /**
     * @param User $githubUser
     * @return \stdClass
     */
    public function transform(User $githubUser)
    {
        $user = [
            'email' => $githubUser->email,
            'profile' => [
                'name' => $githubUser->nickname,
                'type' => 'github'
            ]
        ];

        return $user;
    }
}