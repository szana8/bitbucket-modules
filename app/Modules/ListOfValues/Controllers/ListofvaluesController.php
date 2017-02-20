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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		//
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
