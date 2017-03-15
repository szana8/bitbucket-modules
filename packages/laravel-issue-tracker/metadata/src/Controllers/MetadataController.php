<?php

namespace LaravelIssueTracker\Metadata\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use LaravelIssueTracker\Metadata\Models\Metadata;
use LaravelIssueTracker\Core\Controller\ApiController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\Metadata\Acme\Services\MetadataCreatorService;
use LaravelIssueTracker\Metadata\Acme\Transformers\MetadataTransformer;

class MetadataController extends ApiController {

    /**
     * Property for metadata creator service.
     */
    protected $metadataCreator;

    /**
     * Property for the metadata transformer.
     */
    protected $metadataTransformer;

    /**
     * MetadataController constructor.
     *
     * @param $metadataTransformer
     * @param $metadataCreator
     */
    public function __construct(MetadataTransformer $metadataTransformer, MetadataCreatorService $metadataCreator)
    {
        $this->metadataCreator = $metadataCreator;
        $this->metadataTransformer = $metadataTransformer;
    }


    /**
     * Display the list of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $metadata = Metadata::where('type', 'like', '%' . Request::get('search') . '%')
                            ->orWhere('key', 'like', '%' . Request::get('search') . '%')
                            ->orWhere('value', 'like', '%' . Request::get('search') . '%')
                            ->paginate($this->limit);

        $metadataCollection = $metadata->getCollection();

        return fractal()
            ->collection($metadataCollection)
            ->transformWith(new MetadataTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($metadata))
            ->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try {
            $this->authorize('store');
            $this->metadataCreator->make(Input::all());

            return $this->respondCreated('Metadata successfully created!');
        }
        catch (ValidationException $e) {
            return $this->respondUnprocessable(['message' => $e->getMessage(), 'errors' => $e->getErrors(), 'status_code' => 500]);
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
        $metadata = Metadata::find($id);

        if( ! $metadata )
        {
            return $this->respondNotFound('Metadata does not exist');
        }

        return fractal()
            ->item($metadata)
            ->transformWith(new MetadataTransformer)
            ->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        try {
            $this->authorize('update', Metadata::find($id));
            $this->metadataCreator->update(Input::all(), $id);

            return $this->respondCreated('Metadata successfully updated!');
        }
        catch(ValidationException $e) {
            return $this->respondUnprocessable(['message' => $e->getMessage(), 'errors' => $e->getErrors()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->authorize('destroy', Metadata::find($id));
            $this->metadataCreator->destroy($id);

            return $this->respondCreated('Metadata successfully destroyed!');
        }
        catch(ValidationException $e) {
            return $this->respondUnprocessable(['message' => $e->getMessage(), 'errors' => $e->getErrors()]);
        }
    }
}
