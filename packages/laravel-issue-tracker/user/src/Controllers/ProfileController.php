<?php
namespace LaravelIssueTracker\User\Controllers;

use LaravelIssueTracker\User\Models\Profile;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\User\Acme\Services\ProfileCreatorService;
use LaravelIssueTracker\User\Acme\Transformers\ProfileTransformer;
use LaravelIssueTracker\User\Acme\Validators\ProfileValidator;


class ProfileController extends ApiController
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new Profile;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new ProfileTransformer;
    }

    /**
     * Service for the REST actions.
     *
     * @return \LaravelIssueTracker\Core\Acme\Services\ApiService
     */
    protected function service()
    {
        return new ProfileCreatorService(new ProfileValidator);
    }
}
