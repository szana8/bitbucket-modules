<?php
namespace App\Modules\ListOfValues\Events;

use Illuminate\Queue\SerializesModels;
use LaravelIssueTracker\ListOfValues\Models\ListOfValues;

/**
 * Class ListOfValueWasUpdated
 * @package App\Modules\ListOfValues\Events
 */
class ListOfValueWasUpdated
{
    use SerializesModels;

    /**
     * @var ListOfValues
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