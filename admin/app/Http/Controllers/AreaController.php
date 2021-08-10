<?php

namespace App\Http\Controllers;

use App\Models\AreaModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listArea = AreaModel::where('area_name', 'like', "%$search%")
            ->orwhere('area_address', 'like', "%$search%")->paginate(5);

        return view('area.index',  compact($listArea), [
            'listArea' => $listArea,
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
        return view('area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //image
        $image = $request->file('image');
        $newImageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $newImageName);
        //
        $areaName = $request->get('area_name');
        $areaAddress = $request->get('area_address');

        $area = new AreaModel();
        $area->area_name = $areaName;
        $area->image_path = $newImageName;
        $area->area_address = $areaAddress;
        $area->del_flag = 1;
        $area->save();
        return Redirect::route('area.index')->with('success', 'Thêm khu vực thành công!');
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
        $area = AreaModel::find($id);
        return view('area.edit', compact($area), [
            'area' => $area
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
        $area = AreaModel::find($id);

        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if ($image != '') {
            // $request->validate([
            //     'area_name' => 'require',
            //     'images' => 'require|mimes:jpg,pnd,jpeg|max:2048',
            //     'area_address' => 'require',
            // ]);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $image_name);
        } else {
            // $request->validate([
            //     'area_name' => 'require',
            //     'area_address' => 'require',
            // ]);
        }
        $area->area_name = $request->get('area_name');
        $area->area_address = $request->get('area_address');
        $area->del_flag = $request->get('del_flag');
        $area->image_path = $image_name;
        $area->save();
        return Redirect::route('area.index')->with('success', 'Cập nhật khu vực thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AreaModel::find($id)->delete();
        return Redirect::route('area.index');
    }
}
