<?php namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use Laravel\Socialite\Contracts\User;
use LaravelIssueTracker\Authentication\Acme\Transformers\SocialiteInterface\SocialiteTransformerInterface;

class GoogleAuthTransformer implements SocialiteTransformerInterface {

    /**
     * @param User $googleUser
     * @return \stdClass
     */
    public function transform(User $googleUser)
    {
        $user = [
            'email' => $googleUser->email,
            'profile' => [
                'name' => $googleUser->nickname,
                'type' => 'google'
            ]
        ];

        return $user;
    }
}