<?php
namespace LaravelIssueTracker\ListOfValues\Acme\Transformers;

use LaravelIssueTracker\Core\Acme\Transformers\Transformer;

/**
 * Class ListOfValuesTransformer
 * @package LaravelIssueTracker\ListOfValues\Acme\Transformers
 */
class ListOfValuesTransformer extends Transformer
{

    /**
     * Transform the given array to the proper style.
     *
     * @param $listOfValues
     * @return mixed
     */
    public function transform($listOfValues)
    {
        return $listOfValues;
    }

}