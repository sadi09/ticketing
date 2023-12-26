<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Route;
use App\Models\Stoppage;
use App\Models\Trip;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    function index()
    {
        $routes = Route::with(['startPoint', 'endPoint', 'stoppages', 'stoppages.location'])
            ->get();

        $locations = Location::get();

        return view('bus_route', compact('routes', 'locations'));
    }

    function insertRoute(Request $request)
    {
        $route = new Route;
        $route->start_point = $request->start_point;
        $route->end_point = $request->end_point;
        $route->save();

        $routeId = $route->id;

        foreach ($request->stoppages as $stoppagesId) {
            Stoppage::create([
                'route_id' => $routeId,
                'location_id' => $stoppagesId,
            ]);
        }

        return redirect()->back();
    }
}
