<?php
namespace LaravelIssueTracker\Watcher\Controllers;

use Illuminate\Support\Facades\Input;
use LaravelIssueTracker\Watcher\Models\Watcher;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\Watcher\Acme\Services\WatcherCreatorService;
use LaravelIssueTracker\Watcher\Acme\Transformers\WatcherTransformer;

/**
 * Class WatcherController
 * @package LaravelIssueTracker\Watcher\Controllers
 */
class WatcherController extends ApiController
{

    /**
     * @var WatcherTransformer
     */
    protected $watcherTransformer;

    /**
     * @var WatcherCreatorService
     */
    protected $watcherCreatorService;

    /**
     * WatcherController constructor.
     * @param WatcherTransformer $watcherTransformer
     * @param WatcherCreatorService $watcherCreatorService
     */
    public function __construct(WatcherTransformer $watcherTransformer, WatcherCreatorService $watcherCreatorService)
    {
        $this->watcherTransformer = $watcherTransformer;
        $this->watcherCreatorService = $watcherCreatorService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($issueId)
    {
        $watcher = Watcher::where('issue_id', $issueId)->paginate($this->limit);

        return $this->respond([
            'data' => $this->watcherTransformer->transformCollection($watcher->all())
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
            $this->watcherCreatorService->make(Input::all());
            return $this->respondCreated('Watcher successfully created!');
        }
        catch (ValidationException $e) {
            return $this->respondUnprocessable($e->getMessage());
        }
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
            //$this->authorize('update', Metadata::find($id));
            $this->watcherCreatorService->update(Input::all(), $id);
            return $this->respondCreated('Watcher successfully updated!');
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
            $this->watcherCreatorService->destroy($id);
            return $this->respondCreated('Watcher successfully destroyed!');
        }
        catch(ValidationException $e) {
            return $this->respondUnprocessable($e->getMessage());
        }
    }

}