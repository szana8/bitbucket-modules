<?php
namespace LaravelIssueTracker\Core\Controller;

use League\Fractal\Manager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Fractal\Resource\Item;
use Illuminate\Routing\Controller;
use League\Fractal\Pagination\Cursor;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;

abstract  class ApiController extends Controller
{
    /**
     * Http status code.
     *
     * @var int
     */
    protected $statusCode = Response::HTTP_OK;

    /**
     * Fractal Manager instance.
     *
     * @var Manager
     */
    protected $fractal;

    /**
     * Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Fractal Transformer instance.
     *
     * @var \League\Fractal\TransformerAbstract
     */
    protected $transformer;

    /**
     * Service instance.
     *
     * @var \LaravelIssueTracker\Core\Acme\Services\ApiService
     */
    protected $service;

    /**
     * Illuminate\Http\Request instance.
     *
     * @var Request
     */
    protected $request;

    /**
     * Number of items displayed at once if not specified.
     * There is no limit if it is 0 or false.
     *
     * @var int|bool
     */
    protected $defaultLimit = 20;

    /**
     * Maximum limit that can be set via $_GET['limit'].
     *
     * @var int|bool
     */
    protected $maximumLimit = false;

    /**
     * Resource key for an item.
     *
     * @var string
     */
    protected $resourceKeySingular = 'data';

    /**
     * Resource key for a collection.
     *
     * @var string
     */
    protected $resourceKeyPlural = 'data';

    /**
     * Constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->model = $this->model();
        $this->transformer = $this->transformer();
        $this->service = $this->service();

        $this->fractal = new Manager();
        $this->fractal->setSerializer($this->serializer());

        $this->request = $request;
    }

    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    abstract protected function model();

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    abstract protected function transformer();

    /**
     * Service for the REST actions.
     *
     * @return \LaravelIssueTracker\Core\Acme\Services\ApiService
     */
    abstract protected function service();

    /**
     * Serializer for the current model.
     *
     * @return \League\Fractal\Serializer\SerializerAbstract
     */
    protected function serializer()
    {
        return new DataArraySerializer();
    }

    /**
     * Display a listing of the resource.
     * GET /api/{resource}.
     *
     * @return Response
     */
    public function index()
    {
        $with = $this->getEagerLoad();
        $skip = (int) $this->request->input('skip', 0);
        $limit = $this->calculateLimit();

        $items = $limit
            ? $this->model->with($with)->skip($skip)->limit($limit)->get()
            : $this->model->with($with)->get();

        return $this->respondWithCollection($items, $skip, $limit);
    }

    /**
     * Store a newly created resource in storage.
     * POST /api/{resource}.
     *
     * @return Response
     */
    public function store()
    {
        $data = $this->request->json()->get($this->resourceKeySingular);

        if (!$data) {
            return $this->errorWrongArgs('Empty data');
        }

        try {
            $item = $this->service->make($data);
        } catch(ValidationException $e) {
            return $this->errorWrongArgs($e->getMessage());
        }

        return $this->respondWithItem($item);
    }

    /**
     * Display the specified resource.
     * GET /api/{resource}/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $with = $this->getEagerLoad();

        $item = $this->findItem($id, $with);
        if (!$item) {
            return $this->errorNotFound();
        }

        return $this->respondWithItem($item);
    }

    /**
     * Update the specified resource in storage.
     * PUT /api/{resource}/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        $data = $this->request->json()->get($this->resourceKeySingular);

        if (! $data) {
            return $this->errorWrongArgs('Empty data');
        }

        $item = $this->findItem($id);
        if (! $item) {
            return $this->errorNotFound();
        }

        try {
            $this->service->update($data, $id);
        } catch (ValidationException $e) {
            return $this->errorWrongArgs($e->getMessage());
        }

        return $this->respondWithItem($item);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /api/{resource}/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $item = $this->findItem($id);

        if (! $item) {
            return $this->errorNotFound();
        }

        try {
            $this->service->destroy($id);
        } catch (ValidationException $e) {
            return $this->errorWrongArgs($e->getMessage());
        }

        return $this->respond(['message' => 'Deleted']);
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->errorNotImplemented();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        return $this->errorNotImplemented();
    }

    /**
     * Respond with a given item.
     *
     * @param $item
     *
     * @return mixed
     */
    protected function respondWithItem($item)
    {
        $resource = new Item($item, $this->transformer, $this->resourceKeySingular);

        $rootScope = $this->prepareRootScope($resource);

        return $this->respond($rootScope->toArray());
    }

    /**
     * Respond with a given collection.
     *
     * @param $collection
     * @param int $skip
     * @param int $limit
     *
     * @return mixed
     */
    protected function respondWithCollection($collection, $skip = 0, $limit = 0)
    {
        $resource = new Collection($collection, $this->transformer, $this->resourceKeyPlural);

        if ($limit) {
            $cursor = new Cursor($skip, $skip + $limit, $collection->count());
            $resource->setCursor($cursor);
        }

        $rootScope = $this->prepareRootScope($resource);

        return $this->respond($rootScope->toArray());
    }

    /**
     * Get the http status code.
     *
     * @return int
     */
    protected function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the http status code.
     *
     * @param int $statusCode
     *
     * @return $this
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Send the response as json.
     *
     * @param array $data
     * @param array $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data = [], $headers = [])
    {
        return response()->json($data, $this->statusCode, $headers);
    }

    /**
     * Send the error response as json.
     *
     * @param $message
     *
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message['message'] ?: '',
                'errors' => $message['errors'] ?: '',
                'status_code' => $this->statusCode,
            ],
        ]);
    }

    /**
     * Prepare root scope and set some meta information.
     *
     * @param Item|Collection $resource
     *
     * @return \League\Fractal\Scope
     */
    protected function prepareRootScope($resource)
    {
        return $this->fractal->createData($resource);
    }

    /**
     * Generate a Response with a 400 HTTP header and a given message.
     *
     * @param string $message
     *
     * @return Response
     */
    protected function errorWrongArgs($message = 'Wrong Arguments')
    {
        return $this->setStatusCode(Response::HTTP_BAD_REQUEST)->respondWithError($message);
    }

    /**
     * Generate a Response with a 401 HTTP header and a given message.
     *
     * @param string $message
     *
     * @return Response
     */
    protected function errorUnauthorized($message = 'Unauthorized')
    {
        return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * Generate a Response with a 403 HTTP header and a given message.
     *
     * @param string $message
     *
     * @return Response
     */
    protected function errorForbidden($message = 'Forbidden')
    {
        return $this->setStatusCode(Response::HTTP_FORBIDDEN)->respondWithError($message);
    }

    /**
     * Generate a Response with a 404 HTTP header and a given message.
     *
     * @param string $message
     *
     * @return Response
     */
    protected function errorNotFound($message = 'Resource Not Found')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * Generate a Response with a 405 HTTP header and a given message.
     *
     * @param string $message
     *
     * @return Response
     */
    protected function errorNotAllowed($message = 'Method Not Allowed')
    {
        return $this->setStatusCode(Response::HTTP_METHOD_NOT_ALLOWED)->respondWithError($message);
    }

    /**
     * Generate a Response with a 500 HTTP header and a given message.
     *
     * @param string $message
     *
     * @return Response
     */
    protected function errorInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * Generate a Response with a 501 HTTP header and a given message.
     *
     * @param string $message
     *
     * @return Response
     */
    protected function errorNotImplemented($message = 'Not implemented')
    {
        return $this->setStatusCode(Response::HTTP_NOT_IMPLEMENTED)->respondWithError($message);
    }

    /**
     * Specify relations for eager loading.
     *
     * @return array
     */
    protected function getEagerLoad()
    {
        $includes = $this->transformer->getAvailableIncludes();

        return $includes ?: [];
    }

    /**
     * Get item according to mode.
     *
     * @param int   $id
     * @param array $with
     *
     * @return mixed
     */
    protected function findItem($id, array $with = [])
    {
        if ($this->request->has('use_as_id')) {
            return $this->model->with($with)->where($this->request->input('use_as_id'), '=', $id)->first();
        }

        return $this->model->with($with)->find($id);
    }

    /**
     * Calculates limit for a number of items displayed in list.
     *
     * @return int
     */
    protected function calculateLimit()
    {
        $limit = (int) $this->request->input('limit', $this->defaultLimit);

        return ($this->maximumLimit && $this->maximumLimit < $limit) ? $this->maximumLimit : $limit;
    }
}
