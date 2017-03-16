<?php

namespace LaravelIssueTracker\Metadata\Controllers;

use LaravelIssueTracker\Metadata\Models\Metadata;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\Metadata\Acme\Validators\MetadataValidator;
use LaravelIssueTracker\Metadata\Acme\Services\MetadataCreatorService;
use LaravelIssueTracker\Metadata\Acme\Transformers\MetadataTransformer;

class MetadataController extends ApiController
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new Metadata;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new MetadataTransformer;
    }

    /**
     * Service for the REST actions.
     *
     * @return \LaravelIssueTracker\Core\Acme\Services\ApiService
     */
    protected function service()
    {
        return new MetadataCreatorService(new MetadataValidator);
    }
}
