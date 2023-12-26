<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Location;
use App\Models\Route;
use App\Models\Staff;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    function index()
    {
        $trips = Trip::with(['bus', 'busdriver', 'triproute.startPoint', 'triproute.endPoint'])
            // ->whereDate('leave_time', '>', now())
            ->get();

        $routes = Route::with('startPoint', 'endPoint')->get();
        $bus = Bus::get();
        $staff = Staff::get();


        //return $trips;
        return view('trip', compact('trips', 'routes', 'bus', 'staff'));
    }

    function search(Request $request)
    {
        $fromLocation = $request->post('fromLocation');
        $toLocation = $request->post('toLocation');
        $date = $request->post('date');

        $submittedData = [
            'fromLocation' => $fromLocation,
            'toLocation' => $toLocation,
            'date' => $date,
        ];

        $trips = Trip::with(['bus', 'busdriver', 'triproute', 'triproute.startPoint', 'triproute.endPoint'])
            ->where('leave_time', '>', now())
            ->whereHas('triproute.startPoint', function ($query) use ($fromLocation) {
                $query->where('id', '=', $fromLocation);
            })
            ->whereHas('triproute.endPoint', function ($query) use ($toLocation) {
                $query->where('id', '=', $toLocation);
            })
            ->get();

        $locations = Location::get();
//        return $trips;//['triproute']['start_point']['location_name'];
        return view('dashboard', compact('locations', 'trips'));
    }

    function makeTrip()
    {

    }

    function insertTrip(Request $request)
    {

        Trip::insert([
            'buses_id' => $request->post('bus_id'),
            'route_id' => $request->post('route_id'),
            'driver_id' => $request->post('driver_id'),
            'leave_time' => $request->post('leave_time'),
        ]);
        return redirect()->back();
    }
}
