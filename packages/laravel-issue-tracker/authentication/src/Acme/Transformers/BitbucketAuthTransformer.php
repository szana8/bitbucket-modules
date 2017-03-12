<?php
namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use Laravel\Socialite\Contracts\User;
use LaravelIssueTracker\Authentication\Acme\Transformers\SocialiteInterface\SocialiteTransformerInterface;

/**
 * Class BitbucketAuthTransformer
 * @package LaravelIssueTracker\Authentication\Acme\Transformers
 */
class BitbucketAuthTransformer implements SocialiteTransformerInterface
{
    /**
     * @param User $bitbucketUser
     * @return \stdClass
     */
    public function transform(User $bitbucketUser)
    {
        return [
            'email' => $bitbucketUser->email,
            'profile' => [
                'name' => $bitbucketUser->name,
                'type' => 'bitbucket'
            ]
        ];
    }

}