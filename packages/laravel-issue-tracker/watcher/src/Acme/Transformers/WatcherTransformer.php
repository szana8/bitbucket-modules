<?php
namespace LaravelIssueTracker\Watcher\Acme\Transformers;

use LaravelIssueTracker\Core\Acme\Transformers\Transformer;

/**
 * Class WatcherTransformer
 * @package LaravelIssueTracker\Watcher\Acme\Transformers
 */
class WatcherTransformer extends Transformer
{

    /**
     * @param $item
     * @return mixed
     */
    public function transform($item)
    {
        return $item;
    }
}