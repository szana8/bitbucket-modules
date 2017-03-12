<?php
namespace LaravelIssueTracker\Project\Acme\Transformers;

use LaravelIssueTracker\Core\Acme\Transformers\Transformer;

/**
 * Class ProjectTransformer
 * @package LaravelIssueTracker\Project\Acme\Transformers
 */
class ProjectTransformer extends Transformer
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