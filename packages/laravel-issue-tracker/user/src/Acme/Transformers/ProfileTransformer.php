<?php
namespace LaravelIssueTracker\User\Acme\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class ProfileTransformer
 * @package LaravelIssueTracker\User\Acme\Transformers
 */
class ProfileTransformer extends TransformerAbstract
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