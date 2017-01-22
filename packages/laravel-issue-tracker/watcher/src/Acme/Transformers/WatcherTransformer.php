<?php namespace LaravelIssueTracker\Watcher\Acme\Transformers;

use LaravelIssueTracker\Core\Acme\Transformers\Transformer;

class WatcherTransformer extends Transformer {

    /**
     * @param $item
     * @return mixed
     */
    public function transform($item)
    {
        return $item;
    }
}