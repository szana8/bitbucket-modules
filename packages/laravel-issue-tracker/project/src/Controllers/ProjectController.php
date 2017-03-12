<?php
namespace LaravelIssueTracker\Project\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use LaravelIssueTracker\Project\Models\Project;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\Project\Acme\Services\ProjectCreatorService;
use LaravelIssueTracker\Project\Acme\Transformers\ProjectTransformer;

/**
 * Class ProjectController
 * @package LaravelIssueTracker\Project\Controllers
 */
class ProjectController extends ApiController
{

    /**
     * @var ProfileTransformer
     */
    protected $projectTransformer;
    /**
     * @var ProfileCreatorService
     */
    protected $projectCreatorService;


    /**
     * ProjectController constructor.
     * @param ProjectTransformer $projectTransformer
     * @param ProjectCreatorService $projectCreatorService
     */
    public function __construct(ProjectTransformer $projectTransformer, ProjectCreatorService $projectCreatorService)
    {
        $this->projectTransformer = $projectTransformer;
        $this->projectCreatorService = $projectCreatorService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $project = Project::paginate($this->limit);

        return $this->respond([
            'data' => $this->projectTransformer->transformCollection($project->all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try {
            //$this->authorize('store');
            $this->projectCreatorService->make(Input::all());
            return $this->respondCreated('Project successfully created!');
        }
        catch (ValidationException $e) {
            return $this->respondUnprocessable($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        if( ! $project )
        {
            return $this->respondNotFound('Project does not exist');
        }

        return $this->respond([
            'data' => $this->projectTransformer->transform($project)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->authorize('update', Project::find($id));
            $this->projectCreatorService->update(Input::all(), $id);
            return $this->respondCreated('Project successfully updated!');
        }
        catch(ValidationException $e) {
            return $this->respondUnprocessable($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->projectCreatorService->destroy($id);
            return $this->respondCreated('Project successfully destroyed!');
        }
        catch(ValidationException $e) {
            return $this->respondUnprocessable($e->getMessage());
        }
    }

}