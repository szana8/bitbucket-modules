<?php
namespace LaravelIssueTracker\Metadata\Acme\Transformers;

use League\Fractal\TransformerAbstract;
use LaravelIssueTracker\Metadata\Models\Metadata;

class MetadataTransformer extends TransformerAbstract
{

    /**
     * Transformer function for the Metadata.
     *
     * @param Metadata $metadata
     * @return mixed
     */
    public function transform(Metadata $metadata)
    {
        return $metadata->toArray();
    }

}