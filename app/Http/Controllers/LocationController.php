<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    function index()
    {
        $locationList = Location::get();
        return view('location', compact('locationList'));
    }

    function deleteLocation(Request $request)
    {
        Location::destroy($request->post('id'));
        return $this->index();
    }

    function insertLocation(Request $request)
    {
        $validateData = $request->validate([
            'location_name' => 'required|string',
        ]);

        $data = [
            "location_name" => $request->post('location_name'),
        ];

        Location::insert($data);

        return redirect()->back();
    }
}
