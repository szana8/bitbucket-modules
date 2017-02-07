<?php namespace App\Modules\UserManagement\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller {

    protected $sidebar = [
        [
            'id'       => 'user_management',
            'heading'  => 'User Management',
            'elements' => [
                [
                    'url'       => '',
                    'id'        => '',
                    'class'     => 'nav-icon fa fa-user',
                    'itemclass' => 'nav-item-label',
                    'item'      => 'Users',
                ],
                [
                    'url'       => '',
                    'id'        => '',
                    'class'     => 'nav-icon fa fa-group',
                    'itemclass' => 'nav-item-label',
                    'item'      => 'Groups',
                ],
                [
                    'url'       => '',
                    'id'        => '',
                    'class'     => 'nav-icon fa fa-user-secret',
                    'itemclass' => 'nav-item-label',
                    'item'      => 'Roles',
                ],
                [
                    'url'       => '',
                    'id'        => '',
                    'class'     => 'nav-icon fa fa-key',
                    'itemclass' => 'nav-item-label',
                    'item'      => 'Permissions',
                ],
            ],
        ],
        [
            'id'       => 'user_management',
            'heading'  => '',
            'elements' => [
                [
                    'url'       => '',
                    'id'        => '',
                    'class'     => 'nav-icon fa fa-globe',
                    'itemclass' => 'nav-item-label',
                    'item'      => 'Global Permissions',
                ],
            ],
        ],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view("UserManagement::index")->withSidebars($this->sidebar)->withUsers(User::with('profiles')->get());
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
