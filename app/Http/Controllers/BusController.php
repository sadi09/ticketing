<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    function index()
    {
        $buses = Bus::get();

        return view('bus', compact('buses'));
    }

    function insertBus(Request $request)
    {
        $validateData = $request->validate([
            'bus_name' => 'required|string',
            'seat_capacity' => 'required|integer',
        ]);

        $data = [
            "bus_name" => $request->post('bus_name'),
            "seat_capacity" => $request->post('seat_capacity'),
        ];

        Bus::insert($data);

        return redirect()->back();
    }

    function editBus(Request $request, $id)
    {
        $validateData = $request->validate([
            'bus_name' => 'required|string',
            'seat_capacity' => 'required|integer',
        ]);

        $record = Bus::find($id);
        $record->bus_name = $request->post('bus_name');
        $record->seat_capacity = $request->post('seat_capacity');

        $record->save();

        return $this->index();
    }


    function editUI($id)
    {
        $buses = Bus::get(); //all the bus list
        $busInfo = Bus::find($id);

        return view('bus', compact('busInfo', 'buses'));
    }

    function deleteBus(Request $request)
    {
        Bus::destroy($request->post('id'));
        return $this->index();
    }
}
