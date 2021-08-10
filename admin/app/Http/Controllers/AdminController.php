<?php

namespace App\Http\Controllers;

use App\Models\AreaModel;
use App\Models\AdminModel;
use Illuminate\Http\Request;
use App\Models\ListAdminModel;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listAdmin = ListAdminModel::where('name', 'like', "%$search%")->paginate(5);

        return view('admin.index', [
            'listAdmin' => $listAdmin,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listArea = AreaModel::all();
        return view('admin.create', [
            'listArea' => $listArea
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $gender = $request->get('gender');
        $phone = $request->get('phone');
        $dateBirth = $request->get('date_birth');
        $address = $request->get('address');
        $area_id = $request->get('area_id');

        $admin = new AdminModel();
        $admin->name = $name;
        $admin->email = $email;
        $admin->password = $password;
        $admin->password_encode = $password;
        $admin->gender = $gender;
        $admin->phone = $phone;
        $admin->date_birth = $dateBirth;
        $admin->address = $address;
        $admin->role_id = 2;
        $admin->del_flag = 1;
        $admin->area_id = $area_id;
        $admin->save();
        return Redirect::route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = AdminModel::find($id);
        $listArea = AreaModel::all();
        return view('admin.edit', [
            'admin' => $admin,
            'listArea' => $listArea
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = AdminModel::find($id);

        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->password = $request->get('password');
        $admin->date_birth = $request->get('date_birth');
        $admin->gender = $request->get('gender');
        $admin->phone = $request->get('phone');
        $admin->address = $request->get('address');
        $admin->role_id = 2;
        $admin->area_id = $request->get('area_id');
        $admin->del_flag = $request->get('del_flag');
        $admin->save();
        return Redirect::route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
