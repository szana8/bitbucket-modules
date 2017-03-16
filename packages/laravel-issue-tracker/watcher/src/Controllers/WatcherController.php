<?php
namespace LaravelIssueTracker\Watcher\Controllers;

use LaravelIssueTracker\Watcher\Models\Watcher;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\Watcher\Acme\Validators\WatcherValidator;
use LaravelIssueTracker\Watcher\Acme\Services\WatcherCreatorService;
use LaravelIssueTracker\Watcher\Acme\Transformers\WatcherTransformer;

/**
 * Class WatcherController
 * @package LaravelIssueTracker\Watcher\Controllers
 */
class WatcherController extends ApiController
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new Watcher;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new WatcherTransformer;
    }

    /**
     * Service for the REST actions.
     *
     * @return \LaravelIssueTracker\Core\Acme\Services\ApiService
     */
    protected function service()
    {
        return new WatcherCreatorService(new WatcherValidator);
    }
}