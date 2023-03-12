<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses = Bus::all();
        return view('admin.buses.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'type' => 'required',
            'seats' => 'required'
        ]);

        Bus::create([
            'name' => $request->name,
            'number' => $request->number,
            'type' => $request->type,
            'seats' => $request->seats
        ]);

        return redirect()->route('buses.index')
            ->with('success', 'Bus created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        return view('admin.buses.edit', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'type' => 'required',
            'seats' => 'required'
        ]);

        $bus->update([
            'name' => $request->name,
            'number' => $request->number,
            'type' => $request->type,
            'seats' => $request->seats
        ]);

        return redirect()->route('buses.index')
            ->with('success', 'Bus updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        $bus->delete();

        return redirect()->route('buses.index')
            ->with('success', 'Bus deleted successfully');
    }
}
