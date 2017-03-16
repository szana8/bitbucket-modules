<?php
namespace LaravelIssueTracker\Fileattachment\Controllers;

use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\Fileattachment\Models\Fileattachment;
use LaravelIssueTracker\Fileattachment\Acme\Validators\FileattachmentValidator;
use LaravelIssueTracker\Fileattachment\Acme\Services\FileattachmentCreatorService;
use LaravelIssueTracker\Fileattachment\Acme\Transformers\FileattachmentTransformer;

/**
 * Class FileattachmentController
 * @package LaravelIssueTracker\Fileattachment\Controllers
 */
class FileattachmentController extends ApiController
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new Fileattachment;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new FileattachmentTransformer;
    }

    /**
     * Service for the REST actions.
     *
     * @return \LaravelIssueTracker\Core\Acme\Services\ApiService
     */
    protected function service()
    {
        return new FileattachmentCreatorService(new FileattachmentValidator);
    }
}
