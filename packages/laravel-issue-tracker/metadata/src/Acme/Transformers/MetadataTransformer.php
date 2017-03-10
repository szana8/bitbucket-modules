<?php
namespace LaravelIssueTracker\Metadata\Acme\Transformers;

use LaravelIssueTracker\Core\Acme\Transformers\Transformer;

class MetadataTransformer extends Transformer {

    /**
     * Transformer function for the Metadata.
     *
     * @param $item
     * @return mixed
     */
    public function transform($item)
    {
        return $item;
    }

}