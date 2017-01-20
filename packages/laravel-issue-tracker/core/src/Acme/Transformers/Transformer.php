<?php
namespace LaravelIssueTracker\Core\Acme\Transformers;


abstract class Transformer {

    /**
     * @param $comments
     * @return array
     */
    public function transformCollection($comments)
    {
        return array_map([$this, 'transform'], $comments);
    }

    /**
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);

}