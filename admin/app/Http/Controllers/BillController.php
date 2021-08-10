<?php

namespace App\Http\Controllers;

use App\Models\AreaModel;
use App\Models\BillModel;
use App\Models\PitchModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\TimeModel;
use BillDetail;
use Illuminate\Support\Facades\Redirect;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listArea = AreaModel::all();
        $listPitch = PitchModel::all();
        $listBill = BillModel::where('day', '=', "$search")->paginate(100);
        $listTime = TimeModel::all();
        $listCustomer = CustomerModel::all();
        return view('bill.index', [
            'listCustomer' => $listCustomer,
            'listPitch' => $listPitch,
            'listBill' => $listBill,
            'search' => $search,
            'listTime' => $listTime,
            'listArea' => $listArea
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_id = $request->get('customer_id');
        $day = $request->get('day');
        $time_start = $request->get('time_start');
        $time_end = $request->get('time_end');
        $deposit = $request->get('deposit');
        $area_id = $request->get('area_id');
        $pitch_id = $request->get('pitch_id');
        $pitch = PitchModel::find($pitch_id);
        $price = $pitch->price;
        $bill = new BillModel();
        $bill->customer_id = $customer_id;
        $bill->day = $day;
        $bill->time_start = $time_start;
        $bill->time_end = $time_end;
        $bill->area_id = $area_id;
        $bill->pitch_id = $pitch_id;
        $bill->active = 1;
        $bill->deposit = $deposit;
        $bill->missing = $price - $deposit;
        $bill->save();
        return Redirect::route('bill.index');
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
        //
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
        //
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
