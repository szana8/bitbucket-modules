<?php
namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use Laravel\Socialite\Contracts\User;
use League\Fractal\TransformerAbstract;

class DatabaseAuthTransformer extends TransformerAbstract
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