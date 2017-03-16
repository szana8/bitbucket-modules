<?php
namespace LaravelIssueTracker\Issue\Controllers;

use LaravelIssueTracker\Issue\Models\Issue;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\Issue\Acme\Validators\IssueValidator;
use LaravelIssueTracker\Issue\Acme\Services\IssueCreatorService;
use LaravelIssueTracker\Issue\Acme\Transformers\IssueTransformer;

/**
 * Class IssueController
 * @package LaravelIssueTracker\Issue\Controllers
 */
class IssueController extends ApiController
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new Issue;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new IssueTransformer;
    }

    /**
     * Service for the REST actions.
     *
     * @return \LaravelIssueTracker\Core\Acme\Services\ApiService
     */
    protected function service()
    {
        return new IssueCreatorService(new IssueValidator);
    }
}
