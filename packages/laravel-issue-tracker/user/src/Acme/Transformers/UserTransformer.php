<?php
namespace LaravelIssueTracker\User\Acme\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer
 * @package LaravelIssueTracker\User\Acme\Transformers
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * @param $user
     * @return mixed
     */
    public function transform(User $user)
    {
        return [
            'id'       => $user->id,
            'email'    => $user->email,
            'password' => $user->password,
            'api_token' => $user->api_token,
            //'profile'  => $this->profileTransformer->transform($user['profiles']),
        ];
    }
}