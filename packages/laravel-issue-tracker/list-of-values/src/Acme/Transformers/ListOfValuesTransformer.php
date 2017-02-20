<?php namespace LaravelIssueTracker\ListOfValues\Acme\Transformers;

use LaravelIssueTracker\Core\Acme\Transformers\Transformer;

class ListOfValuesTransformer extends Transformer {

    public function transform($listOfValues)
    {
        return $listOfValues;
    }

}