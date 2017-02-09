<?php
namespace LaravelIssueTracker\Core\Acme\Transformers;


abstract class Transformer {

    /**
     * @param $items
     * @return array
     */
    public function transformCollection($items)
    {
        //return $items->map([$this, 'transform']);
        return array_map([$this, 'transform'], $items);
    }

    /**
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);

}