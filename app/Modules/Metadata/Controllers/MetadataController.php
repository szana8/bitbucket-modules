<?php namespace App\Modules\Metadata\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MetadataController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $request = Request::create('api/v1/metadata', 'GET', ['api_token' => \Auth::user()->api_token,
                                                               'page' => request()->page,
                                                               'search' => request()->search
        ]);

        \Request::replace($request->input());
        $response = json_decode(\Route::dispatch($request)->getContent());

		return view("Metadata::index")->withMetadatas($response);
	}

}
