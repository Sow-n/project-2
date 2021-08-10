<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PitchTypeModel;
use Illuminate\Support\Facades\Redirect;
use PitchType;

class PitchTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPitchType = PitchTypeModel::all();
        return view('pitchType.index', [
            'listPitchType' => $listPitchType
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pitchType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type_name = $request->get('type_name');

        $pitchType = new PitchTypeModel();
        $pitchType->pitch_type_name = $type_name;
        $pitchType->del_flag = 1;
        $pitchType->save();
        return Redirect::route('pitchType.index');
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
        $pitchType = PitchTypeModel::find($id);
        return view('pitchType.edit', [
            'pitchType' => $pitchType
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
        $pitchType = PitchTypeModel::find($id);

        $pitchType->pitch_type_name = $request->get('type_name');
        $pitchType->del_flag = $request->get('del_flag');
        $pitchType->save();

        return Redirect::route('pitchType.index');
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
