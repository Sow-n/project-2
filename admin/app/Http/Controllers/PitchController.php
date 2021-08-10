<?php

namespace App\Http\Controllers;

use App\Models\AreaModel;
use App\Models\PitchModel;
use Illuminate\Http\Request;
use App\Models\ListPitchModel;
use App\Models\PitchTypeModel;
use Illuminate\Support\Facades\Redirect;
use Pitch;

class PitchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listPitch = ListPitchModel::where('pitch_name', 'like', "%$search%")->paginate(5);

        return view('pitch.index', [
            'listPitch' => $listPitch,
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
        $listPitchType = PitchTypeModel::all();
        return view('pitch.create', [
            'listPitchType' => $listPitchType,
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
        //image
        $image = $request->file('image');
        $newImageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $newImageName);
        //
        $pitchName = $request->get('pitch_name');
        $areaId = $request->get('area_id');
        $pitchTypeId = $request->get('pitch_type_id');
        $price = $request->get('price');

        $pitch = new PitchModel();
        $pitch->pitch_name = $pitchName;
        $pitch->area_id = $areaId;
        $pitch->pitch_type_id = $pitchTypeId;
        $pitch->image_path = $newImageName;
        $pitch->price = $price;
        $pitch->del_flag = 1;
        $pitch->save();
        return Redirect::route('pitch.index')->with('success', 'Thêm sân thành công!');
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
        $pitch = PitchModel::find($id);
        $pitch_all = PitchModel::all();
        $listArea = AreaModel::all();
        $listPitchType = PitchTypeModel::all();

        return view('pitch.edit', [
            'pitch' => $pitch,
            'pitch_all' => $pitch_all,
            'listArea' => $listArea,
            'listPitchType' => $listPitchType
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
        $pitch = PitchModel::find($id);
        // image
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
        $pitch->pitch_name = $request->get('pitch_name');
        $pitch->image_path = $image_name;
        $pitch->price = $request->get('price');
        $pitch->area_id = $request->get('area_id');
        $pitch->pitch_type_id = $request->get('pitch_type_id');
        $pitch->del_flag = $request->get('del_flag');
        $pitch->save();

        return Redirect::route('pitch.index')->with('success', 'Cập nhật sân thành công!');
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
