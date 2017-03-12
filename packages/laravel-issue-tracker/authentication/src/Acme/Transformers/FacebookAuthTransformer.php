<?php
namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use Laravel\Socialite\Contracts\User;
use LaravelIssueTracker\Authentication\Acme\Transformers\SocialiteInterface\SocialiteTransformerInterface;

/**
 * Class FacebookAuthTransformer
 * @package LaravelIssueTracker\Authentication\Acme\Transformers
 */
class FacebookAuthTransformer implements SocialiteTransformerInterface
{
    /**
     * @param User $facebookUser
     * @return \stdClass
     */
    public function transform(User $facebookUser)
    {
        return [
            'email' => $facebookUser->email,
            'profile' => [
                'name' => $facebookUser->name,
                'type' => 'facebook'
            ]
        ];
    }

}