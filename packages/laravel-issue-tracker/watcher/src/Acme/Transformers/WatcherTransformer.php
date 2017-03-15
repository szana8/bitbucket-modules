<?php
namespace LaravelIssueTracker\Watcher\Acme\Transformers;

use League\Fractal\TransformerAbstract;
use LaravelIssueTracker\Watcher\Models\Watcher;

/**
 * Class WatcherTransformer
 * @package LaravelIssueTracker\Watcher\Acme\Transformers
 */
class WatcherTransformer extends TransformerAbstract
{

    /**
     * @param Watcher $watcher
     * @return Watcher
     */
    public function transform(Watcher $watcher)
    {
        return $watcher->toArray();
    }
}