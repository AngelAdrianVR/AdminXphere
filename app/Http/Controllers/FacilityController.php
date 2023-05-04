<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FacilityController extends Controller
{

    public function index()
    {
        
    }


    public function create()
    {
        return inertia('ReservationFacilities/Create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'location'  => 'required|string',
            'capacity'  => 'required|numeric|min:1',
            'cost' => 'required|numeric|min:0',
            'hours_available'  => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_active'  => 'boolean',
        ]);
        
        // return $request;
        
        Facility::create($request->all() + ['sphere_id' => auth()->user()->sphere_id]);

        return redirect()->route('reservation-facilities.index');
    }


    public function show(Facility $facility)
    {
        
    }


    public function edit(Facility $facility)
    {
        return inertia('ReservationFacilities/Edit',compact('facility'));
    }


    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'location'  => 'required|string',
            'capacity'  => 'required|numeric|min:1',
            'cost' => 'required|numeric|min:0',
            'hours_available'  => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_active'  => 'boolean',
        ]);
        
        
        $facility->update($request->all() + ['sphere_id' => auth()->user()->sphere_id]);

        return redirect()->route('reservation-facilities.index');
    }


    public function destroy(Facility $facility)
    {
        //
    }
}
