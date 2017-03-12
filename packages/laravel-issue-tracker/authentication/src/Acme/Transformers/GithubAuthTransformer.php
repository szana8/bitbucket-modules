<?php
namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use Laravel\Socialite\Contracts\User;
use LaravelIssueTracker\Authentication\Acme\Transformers\SocialiteInterface\SocialiteTransformerInterface;

/**
 * Class GithubAuthTransformer
 * @package LaravelIssueTracker\Authentication\Acme\Transformers
 */
class GithubAuthTransformer implements SocialiteTransformerInterface
{
    /**
     * @param User $githubUser
     * @return \stdClass
     */
    public function transform(User $githubUser)
    {
        return [
            'email' => $githubUser->email,
            'profile' => [
                'name' => $githubUser->nickname,
                'type' => 'github'
            ]
        ];
    }

}