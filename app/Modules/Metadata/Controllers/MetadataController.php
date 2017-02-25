<?php namespace App\Modules\Metadata\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Metadata module controller.
 * Class MetadataController
 * @package App\Modules\Metadata\Controllers
 */
class MetadataController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("Metadata::index")->withList($this->callApi());
	}


    public function getList()
    {
        $request = Request::create('api/v1/metadata',
            'GET',
            [
                'api_token' => \Auth::user()->api_token,
                'page' => request()->page,
                'search' => request()->search
            ]);
        \Request::replace($request->input());
        return \Route::dispatch($request)->getContent();
    }

    /**
     * Call the metadata API to get the list of the metadata.
     *
     * @return mixed
     */
	protected function callApi()
    {
        $request = Request::create('api/v1/metadata',
                                    'GET',
                                    [
                                        'api_token' => \Auth::user()->api_token,
                                        'page' => request()->page,
                                        'search' => request()->search
                                    ]);
        \Request::replace($request->input());
        return json_decode(\Route::dispatch($request)->getContent());
    }



}
