<?php
namespace LaravelIssueTracker\Issue\Controllers;

use Illuminate\Support\Facades\Input;
use LaravelIssueTracker\Issue\Models\Issue;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\Issue\Acme\Services\IssueCreatorService;
use LaravelIssueTracker\Issue\Acme\Transformers\IssueTransformer;

/**
 * Class IssueController
 * @package LaravelIssueTracker\Issue\Controllers
 */
class IssueController extends ApiController
{

    /**
     * @var IssueTransformer
     */
    protected $issueTransformer;
    /**
     * @var IssueCreatorService
     */
    protected $issueCreatorService;


    /**
     * IssueController constructor.
     * @param IssueTransformer $issueTransformer
     * @param IssueCreatorService $issueCreatorService
     */
    public function __construct(IssueTransformer $issueTransformer, IssueCreatorService $issueCreatorService)
    {
        $this->issueTransformer = $issueTransformer;
        $this->issueCreatorService = $issueCreatorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //, 'comments', 'watchers', 'attachments', 'transitions'
        $issue = Issue::with('reporter', 'assignee')->paginate($this->limit);

        return $this->respond([
            'data' => $this->issueTransformer->transformCollection($issue->all())
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
            $this->issueCreatorService->make(Input::all());
            return $this->respondCreated('Issue successfully created!');
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
        //, 'comments', 'watchers', 'attachments', 'transitions'
        $issue = Issue::with('reporter', 'assignee')->find($id);

        if( ! $issue )
        {
            return $this->respondNotFound('Issue does not exist');
        }

        return $this->respond([
            'data' => $this->issueTransformer->transform($issue)
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
            $this->authorize('update', Issue::find($id));
            $this->issueCreatorService->update(Input::all(), $id);
            return $this->respondCreated('Issue successfully updated!');
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
            $this->issueCreatorService->destroy($id);
            return $this->respondCreated('Issue successfully destroyed!');
        }
        catch(ValidationException $e) {
            return $this->respondUnprocessable($e->getMessage());
        }
    }

}