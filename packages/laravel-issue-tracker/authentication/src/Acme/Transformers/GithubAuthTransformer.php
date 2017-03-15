<?php
namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use Laravel\Socialite\Contracts\User;
use League\Fractal\TransformerAbstract;

/**
 * Class GithubAuthTransformer
 * @package LaravelIssueTracker\Authentication\Acme\Transformers
 */
class GithubAuthTransformer extends TransformerAbstract
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
                'name' => $user->nickname,
                'type' => 'github'
            ]
        ];
    }

}