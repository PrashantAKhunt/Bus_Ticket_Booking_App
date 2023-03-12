<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = Route::all();
        return view('admin.routes.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = \App\Models\City::all();
        return view('admin.routes.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'source_city_id' => 'required',
            'destination_city_id' => 'required',
            'distance' => 'required',
            'duration' => 'required',
        ]);

        Route::create([
            'name' => $request->name,
            'source_city_id' => $request->source_city_id,
            'destination_city_id' => $request->destination_city_id,
            'distance' => $request->distance,
            'duration' => $request->duration,
        ]);

        return redirect()->route('routes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        $cities = \App\Models\City::all();
        return view('admin.routes.edit', compact('route', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route)
    {
        $request->validate([
            'name' => 'required',
            'source_city_id' => 'required',
            'destination_city_id' => 'required',
            'distance' => 'required',
            'duration' => 'required',
        ]);

        $route->update([
            'name' => $request->name,
            'source_city_id' => $request->source_city_id,
            'destination_city_id' => $request->destination_city_id,
            'distance' => $request->distance,
            'duration' => $request->duration,
        ]);

        return redirect()->route('routes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        $route->delete();
        return redirect()->route('routes.index');
    }
}
