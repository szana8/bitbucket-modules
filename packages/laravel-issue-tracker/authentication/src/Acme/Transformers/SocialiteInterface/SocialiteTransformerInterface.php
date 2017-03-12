<?php
namespace LaravelIssueTracker\Authentication\Acme\Transformers\SocialiteInterface;

use Laravel\Socialite\Contracts\User;

/**
 * Interface SocialiteTransformerInterface
 * @package LaravelIssueTracker\Authentication\Acme\Transformers\SocialiteInterface
 */
interface SocialiteTransformerInterface
{
    /**
     * @param User $user
     * @return mixed
     */
    public function transform(User $user);

}