<?php
namespace LaravelIssueTracker\ListOfValues\Acme\Transformers;

use League\Fractal\TransformerAbstract;
use LaravelIssueTracker\ListOfValues\Models\ListOfValues;

/**
 * Class ListOfValuesTransformer
 * @package LaravelIssueTracker\ListOfValues\Acme\Transformers
 */
class ListOfValuesTransformer extends TransformerAbstract
{

    /**
     * Transform the given array to the proper style.
     *
     * @param ListOfValues $listOfValues
     * @return mixed
     */
    public function transform(ListOfValues $listOfValues)
    {
        return $listOfValues->toArray();
    }

}