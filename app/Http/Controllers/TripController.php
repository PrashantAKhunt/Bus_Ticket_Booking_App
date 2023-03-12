<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function findTrip(Request $request)
    {
        $cities = \App\Models\City::all();
        $trips = Trip::whereHas('route', function ($query) use ($request) {
            $query->where('source_city_id', $request->source_city_id);
            $query->where('destination_city_id', $request->destination_city_id);
        })->where('arrival_time', '>=', $request->departure_date)->get();

        return view('trips', compact('trips', 'cities'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();
        return view('admin.trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = \App\Models\Route::all();
        $buses = \App\Models\Bus::all();
        return view('admin.trips.create', compact('routes', 'buses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'route_id' => 'required',
            'bus_id' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required',
        ]);

        Trip::create([
            'route_id' => $request->route_id,
            'bus_id' => $request->bus_id,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'price' => $request->price,
        ]);

        return redirect()->route('trips.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        $routes = \App\Models\Route::all();
        $buses = \App\Models\Bus::all();
        return view('admin.trips.edit', compact('trip', 'routes', 'buses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'route_id' => 'required',
            'bus_id' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required',
        ]);

        $trip->update([
            'route_id' => $request->route_id,
            'bus_id' => $request->bus_id,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'price' => $request->price,
        ]);

        return redirect()->route('trips.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('trips.index');
    }
}
