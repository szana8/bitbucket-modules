<?php namespace LaravelIssueTracker\ListOfValues\Controllers;

use Illuminate\Support\Facades\Input;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\ListOfValues\Acme\Services\ListOfValuesLookupsService;
use LaravelIssueTracker\ListOfValues\Acme\Services\ListOfValuesService;
use LaravelIssueTracker\ListOfValues\Acme\Transformers\ListOfValuesTransformer;
use LaravelIssueTracker\ListOfValues\Models\ListOfValues;

class ListOfValuesController extends ApiController {

    /**
     * @var ListOfValuesTransformer
     */
    protected $listOfValuesTransformer;
    /**
     * @var ListOfValuesService
     */
    protected $listOfValuesService;
    /**
     * @var ListOfValuesLookupsService
     */
    protected $listOfValuesLookupsService;


    /**
     * ListOfValuesController constructor.
     * @param ListOfValuesTransformer $listOfValuesTransformer
     * @param ListOfValuesService $listOfValuesService
     * @param ListOfValuesLookupsService $listOfValuesLookupsService
     */
    public function __construct(ListOfValuesTransformer $listOfValuesTransformer, ListOfValuesService $listOfValuesService, ListOfValuesLookupsService $listOfValuesLookupsService)
    {
        $this->listOfValuesTransformer = $listOfValuesTransformer;
        $this->listOfValuesService = $listOfValuesService;
        $this->listOfValuesLookupsService = $listOfValuesLookupsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $listOfValues = ListOfValues::with('lookups')
            ->where('name', 'like', '%' . \Request::get('search') . '%')
            ->orWhere('datatype', 'like', '%' . \Request::get('search') . '%')
            ->orWhere('table', 'like', '%' . \Request::get('search') . '%')
            ->orWhere('column', 'like', '%' . \Request::get('search') . '%')
            ->paginate($this->limit);

        return $this->respond([
            'data'       => $this->listOfValuesTransformer->transformCollection($listOfValues->all()),
            'pagination' => (string) $listOfValues->appends(\Request::only('search'))->links(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $listOfValues = ListOfValues::with('lookups')->find($id);

        if ( ! $listOfValues)
        {
            return $this->respondNotFound('List Of Value does not exist');
        }

        return $this->respond([
            'data' => $this->listOfValuesTransformer->transform($listOfValues),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store()
    {
        try
        {
            $this->listOfValuesService->make(Input::all());
            return $this->respondCreated('List Of Value successfully created!');
        }
        catch (ValidationException $e)
        {
            return $this->respondUnprocessable(['message' => $e->getMessage(), 'errors' => $e->getErrors()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Request $request
     * @param $id
     * @return mixed
     */
    public function update(\Request $request, $id)
    {
        try
        {
            // Store the original input of the request and then replace the input with your request instances input.
            $this->listOfValuesService->update(Input::all(), $id);

            return $this->respondCreated('List of Value successfully updated!');
        } catch ( ValidationException $e )
        {
            return $this->respondUnprocessable(['message' => $e->getMessage(), 'errors' => $e->getErrors()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        try
        {
            $this->listOfValuesService->destroy($id);

            return $this->respondCreated('List of Value successfully destroyed!');
        } catch ( ValidationException $e )
        {
            return $this->respondUnprocessable($e->getMessage());
        }
    }
}