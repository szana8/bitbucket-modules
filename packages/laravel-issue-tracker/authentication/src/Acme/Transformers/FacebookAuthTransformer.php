<?php namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use Laravel\Socialite\Contracts\User;
use LaravelIssueTracker\Authentication\Acme\Transformers\SocialiteInterface\SocialiteTransformerInterface;

class FacebookAuthTransformer implements SocialiteTransformerInterface {

    /**
     * @param User $facebookUser
     * @return \stdClass
     */
    public function transform(User $facebookUser)
    {
        $user = [
            'email' => $facebookUser->email,
            'profile' => [
                'name' => $facebookUser->name,
                'type' => 'facebook'
            ]
        ];

        return $user;
    }
}