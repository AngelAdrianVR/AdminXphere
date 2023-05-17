<?php

namespace App\Http\Controllers;

use App\Http\Resources\FacilityResource;
use App\Models\Facility;
use App\Models\ReservationFacility;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FacilityController extends Controller
{

    public function index()
    {
        $sphere_id = auth()->user()->sphere_id;
        $facilities = FacilityResource::collection(Facility::where('sphere_id', $sphere_id)->get());

        return Inertia::render('Facility/Index', compact('facilities'));
    }


    public function create()
    {
        return inertia('Facility/Create');
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
        
        $facility = Facility::create($request->all() + ['sphere_id' => auth()->user()->sphere_id]);
        $facility->addAllMediaFromRequest()->each(fn ($file) => $file->toMediaCollection());

        return redirect()->route('facilities.index');
    }


    public function show(Facility $facility)
    {
        
    }


    public function edit(Facility $facility)
    {
        return inertia('Facility/Edit',compact('facility'));
    }


    public function update(Request $request, Facility $facility)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string|max:100',
            'location'  => 'required|string',
            'capacity'  => 'required|numeric|min:1',
            'cost' => 'required|numeric|min:0',
            'hours_available'  => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_active'  => 'boolean',
        ]);
        
        
        $facility->update($request->all() + [
            'sphere_id' => auth()->user()->sphere_id,
            'is_active' => $request->is_active
        ]);

        return redirect()->route('facilities.index');
    }


    public function destroy(Facility $facility)
    {
        $facility->delete();
        request()->session()->flash('flash.banner', 'Se eliminó correctamente');
        request()->session()->flash('flash.bannerStyle', 'success');
        return to_route('facilities.index');
    }
}
