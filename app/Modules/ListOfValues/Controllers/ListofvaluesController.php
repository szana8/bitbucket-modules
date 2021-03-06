<?php namespace App\Modules\ListOfValues\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\ListOfValues\ListOfValueHelper;
use Illuminate\Http\Request;

class ListOfValuesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $request = Request::create('api/v1/ListOfValues', 'GET', ['api_token' => \Auth::user()->api_token,
                                                                  'page' => request()->page,
                                                                  'search' => request()->search]);

        \Request::replace($request->input());
        $response = json_decode(\Route::dispatch($request)->getContent());

		return view("ListOfValues::index")->withlistofvalues($response)->withTables(ListOfValueHelper::getTables());
	}

}
