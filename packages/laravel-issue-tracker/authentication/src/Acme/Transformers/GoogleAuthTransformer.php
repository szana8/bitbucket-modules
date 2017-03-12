<?php
namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use Laravel\Socialite\Contracts\User;
use LaravelIssueTracker\Authentication\Acme\Transformers\SocialiteInterface\SocialiteTransformerInterface;

/**
 * Class GoogleAuthTransformer
 * @package LaravelIssueTracker\Authentication\Acme\Transformers
 */
class GoogleAuthTransformer implements SocialiteTransformerInterface
{
    /**
     * @param User $googleUser
     * @return \stdClass
     */
    public function transform(User $googleUser)
    {
        return [
            'email' => $googleUser->email,
            'profile' => [
                'name' => $googleUser->nickname,
                'type' => 'google'
            ]
        ];
    }

}