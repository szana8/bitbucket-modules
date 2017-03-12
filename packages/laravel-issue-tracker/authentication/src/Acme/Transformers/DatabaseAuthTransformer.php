<?php
namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use Laravel\Socialite\Contracts\User;
use LaravelIssueTracker\Authentication\Acme\Transformers\SocialiteInterface\SocialiteTransformerInterface;

class DatabaseAuthTransformer implements SocialiteTransformerInterface
{
    /**
     * @param User $user
     * @return mixed
     */
    public function transform(User $user)
    {
        return [
            'email' => $user->email,
            'profile' => [
                'name' => $user->name,
                'type' => 'database'
            ]
        ];
    }
}