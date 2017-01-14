<?php namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use Laravel\Socialite\Contracts\User;
use LaravelIssueTracker\Authentication\Acme\Transformers\SocialiteInterface\SocialiteTransformerInterface;

class BitbucketAuthTransformer implements SocialiteTransformerInterface {

    /**
     * @param User $bitbucketUser
     * @return \stdClass
     */
    public function transform(User $bitbucketUser)
    {
        $user = [
            'email' => $bitbucketUser->email,
            'profile' => [
                'name' => $bitbucketUser->name,
                'type' => 'bitbucket'
            ]
        ];

        return $user;
    }
}