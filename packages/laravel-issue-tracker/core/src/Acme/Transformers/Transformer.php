<?php
namespace LaravelIssueTracker\Core\Acme\Transformers;

/**
 * Class Transformer
 * @package LaravelIssueTracker\Core\Acme\Transformers
 */
abstract class Transformer
{
    /**
     * Transform the given collection to the proper style.
     *
     * @param $items
     * @return array
     */
    public function transformCollection($items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * Abstract function for the transformation, need to be implement in the child class.
     *
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);

}