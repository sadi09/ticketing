<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class SeatAllocationController extends Controller
{
    function index($id)
    {
        $trip = Trip::with(['bus', 'busdriver', 'triproute', 'triproute.startPoint', 'triproute.endPoint'])
            ->find($id);

        return $trip;

        //return view('trip_details', compact('trip'));
    }
}
