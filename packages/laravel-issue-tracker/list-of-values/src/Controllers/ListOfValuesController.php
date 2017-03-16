<?php
namespace LaravelIssueTracker\ListOfValues\Controllers;

use Illuminate\Support\Facades\Input;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\ListOfValues\Acme\Validators\ListOfValuesLookupsValidator;
use LaravelIssueTracker\ListOfValues\Acme\Validators\ListOfValuesValidator;
use LaravelIssueTracker\ListOfValues\Models\ListOfValues;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\ListOfValues\Acme\Services\ListOfValuesService;
use LaravelIssueTracker\ListOfValues\Acme\Services\ListOfValuesLookupsService;
use LaravelIssueTracker\ListOfValues\Acme\Transformers\ListOfValuesTransformer;

/**
 * Class ListOfValuesController
 * @package LaravelIssueTracker\ListOfValues\Controllers
 */
class ListOfValuesController extends ApiController
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new ListOfValues;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new ListOfValuesTransformer;
    }

    /**
     * Service for the REST actions.
     *
     * @return \LaravelIssueTracker\Core\Acme\Services\ApiService
     */
    protected function service()
    {
        return new ListOfValuesService(new ListOfValuesValidator, new ListOfValuesLookupsService(new ListOfValuesLookupsValidator));
    }
}
