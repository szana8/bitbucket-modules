<?php
namespace LaravelIssueTracker\User\Acme\Transformers;

use LaravelIssueTracker\Core\Acme\Transformers\Transformer;

/**
 * Class ProfileTransformer
 * @package LaravelIssueTracker\User\Acme\Transformers
 */
class ProfileTransformer extends Transformer
{

    /**
     * @param $profiles
     * @return mixed
     */
    public function transform($profiles)
    {
        $userProfile = array();
        foreach ($profiles as $key => $profile)
        {
            $userProfile[ $key ]['user_id'] = $profile['user_id'];
            $userProfile[ $key ]['name'] = $profile['name'];
            $userProfile[ $key ]['type'] = $profile['type'];
        }

        return $userProfile;
    }
}