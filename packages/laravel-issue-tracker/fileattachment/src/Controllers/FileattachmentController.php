<?php
namespace LaravelIssueTracker\Fileattachment\Controllers;

use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\Fileattachment\Models\Fileattachment;
use LaravelIssueTracker\Fileattachment\Acme\Services\FileattachmentCreatorService;
use LaravelIssueTracker\Fileattachment\Acme\Transformers\FileattachmentTransformer;

/**
 * Class FileattachmentController
 * @package LaravelIssueTracker\Fileattachment\Controllers
 */
class FileattachmentController extends ApiController
{

    /**
    * @var IssueTransformer
    */
    protected $fileattachmentTransformer;
    /**
     * @var IssueCreatorService
     */
    protected $fileattachmentCreator;

    /**
     * FileattachmentController constructor.
     *
     * @param FileattachmentTransformer $fileattachmentTransformer
     * @param FileattachmentCreatorService $fileattachmentCreatorService
     */
    public function __construct(FileattachmentTransformer $fileattachmentTransformer, FileattachmentCreatorService $fileattachmentCreatorService)
    {
        $this->fileattachmentTransformer = $fileattachmentTransformer;
        $this->fileattachmentCreator = $fileattachmentCreatorService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //, 'comments', 'watchers', 'attachments', 'transitions'
        $fileattachment = Fileattachment::paginate($this->limit);

        return $this->respond([
            'data' => $this->fileattachmentTransformer->transformCollection($fileattachment->all())
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
            $this->fileattachmentCreator->make(Input::all());
            return $this->respondCreated('Fileattachment successfully created!');
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
        $fileattachment = Fileattachment::find($id);

        if( ! $fileattachment )
        {
            return $this->respondNotFound('Fileattachment does not exist');
        }

        return $this->respond([
            'data' => $this->fileattachmentTransformer->transform($fileattachment)
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
            $this->authorize('update', Fileattachment::find($id));
            $this->fileattachmentCreator->update(Input::all(), $id);
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
            $this->fileattachmentCreator->destroy($id);
            return $this->respondCreated('Fileattachment successfully destroyed!');
        }
        catch(ValidationException $e) {
            return $this->respondUnprocessable($e->getMessage());
        }
    }

}