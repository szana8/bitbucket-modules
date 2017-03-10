<?php

namespace LaravelIssueTracker\Metadata\Events;

use Illuminate\Queue\SerializesModels;
use LaravelIssueTracker\Metadata\Models\Metadata;

class MetadataWasDestroyed
{
    use SerializesModels;

    /**
     * @var metadata
     */
    public $metadata;

    /**
     * Create a new event instance.
     *
     * @param Metadata $metadata
     */
    public function __construct(Metadata $metadata)
    {
        $this->metadata = $metadata;
    }

}
