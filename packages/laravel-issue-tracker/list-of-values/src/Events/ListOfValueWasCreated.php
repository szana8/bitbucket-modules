<?php
namespace App\Modules\ListOfValues\Events;

use LaravelIssueTracker\ListOfValues\Models\ListOfValues;

/**
 * Class ListOfValueWasCreated
 * @package App\Modules\ListOfValues\Events
 */
class ListOfValueWasCreated
{
    use SerializesModels;

    /**
     * @var
     */
    private $listOfValue;

    /**
     * Create a new event instance.
     *
     * @param ListOfValues $listOfValues
     */
    public function __construct(ListOfValues $listOfValues)
    {
        $this->listOfValue = $listOfValues;
    }

}