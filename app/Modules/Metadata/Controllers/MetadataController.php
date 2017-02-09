<?php namespace App\Modules\Metadata\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MetadataController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $request = Request::create('/api/v1/metadata', 'GET', ['api_token' => \Auth::user()->api_token, 'page' => request()->page, 'search' => request()->search]);
        \Request::replace($request->input());
        $response = json_decode(\Route::dispatch($request)->getContent());

		return view("Metadata::index")->withMetadatas($response);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $token = array('api_token' => \Auth::user()->api_token);
	    $merge = array_merge(Input::all(), $token);

        $request = Request::create('/api/v1/metadata', 'POST', $merge);
        \Request::replace($request->input());
        $response = json_decode(\Route::dispatch($request)->getContent());

        return \Response::json($response);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $request = Request::create('/api/v1/metadata/' . $id, 'GET', ['api_token' => \Auth::user()->api_token]);
        \Request::replace($request->input());
        $response = \Route::dispatch($request);
        dd($response);
        return \Response::json($response);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $token = array('api_token' => \Auth::user()->api_token);
        $merge = array_merge(Input::all(), $token);

        $request = Request::create('/api/v1/metadata', 'POST', $merge);
        \Request::replace($request->input());
        $response = json_decode(\Route::dispatch($request)->getContent());

        return \Response::json($response);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
