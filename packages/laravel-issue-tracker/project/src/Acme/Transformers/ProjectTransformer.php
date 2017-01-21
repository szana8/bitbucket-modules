<?php namespace LaravelIssueTracker\Project\Acme\Transformers;

use LaravelIssueTracker\Core\Acme\Transformers\Transformer;

class ProjectTransformer extends Transformer {

    /**
     * @param $item
     * @return mixed
     */
    public function transform($item)
    {
        return $item;
    }
}