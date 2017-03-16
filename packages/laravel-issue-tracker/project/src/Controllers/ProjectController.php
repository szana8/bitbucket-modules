<?php
namespace LaravelIssueTracker\Project\Controllers;

use LaravelIssueTracker\Project\Models\Project;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\Project\Acme\Validators\ProjectValidator;
use LaravelIssueTracker\Project\Acme\Services\ProjectCreatorService;
use LaravelIssueTracker\Project\Acme\Transformers\ProjectTransformer;

/**
 * Class ProjectController
 * @package LaravelIssueTracker\Project\Controllers
 */
class ProjectController extends ApiController
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new Project;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new ProjectTransformer;
    }

    /**
     * Service for the REST actions.
     *
     * @return \LaravelIssueTracker\Core\Acme\Services\ApiService
     */
    protected function service()
    {
        return new ProjectCreatorService(new ProjectValidator);
    }
}
