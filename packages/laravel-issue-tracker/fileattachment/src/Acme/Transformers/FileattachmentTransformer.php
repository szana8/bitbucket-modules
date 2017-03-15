<?php
namespace LaravelIssueTracker\Fileattachment\Acme\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class FileattachmentTransformer
 * @package LaravelIssueTracker\Fileattachment\Acme\Transformers
 */
class FileattachmentTransformer extends TransformerAbstract
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