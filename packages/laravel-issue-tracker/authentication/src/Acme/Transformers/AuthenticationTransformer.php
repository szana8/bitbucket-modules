<?php namespace LaravelIssueTracker\Authentication\Acme\Transformers;

use LaravelIssueTracker\Core\Acme\Transformers\Transformer;

class AuthenticationTransformer extends Transformer {

    /**
     * @param $item
     * @return mixed
     */
    public function transform($item)
    {
        return $item;
    }
}