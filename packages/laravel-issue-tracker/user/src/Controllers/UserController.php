<?php
namespace LaravelIssueTracker\User\Controllers;

use App\User;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\User\Acme\Services\UserCreatorService;
use LaravelIssueTracker\User\Acme\Transformers\UserTransformer;
use LaravelIssueTracker\User\Acme\Services\ProfileCreatorService;
use LaravelIssueTracker\User\Acme\Validators\ProfileValidator;
use LaravelIssueTracker\User\Acme\Validators\UserValidator;

/**
 * Class UserController
 * @package LaravelIssueTracker\User\Controllers
 */
class UserController extends ApiController
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
       return new User;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new UserTransformer;
    }

    /**
     * Service for the REST actions.
     *
     * @return \LaravelIssueTracker\Core\Acme\Services\ApiService
     */
    protected function service()
    {
        return new UserCreatorService(new UserValidator, new ProfileCreatorService(new ProfileValidator));
    }
}