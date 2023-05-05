<?php

namespace App\Http\Controllers;

use App\Models\ExternalServices;
use Illuminate\Http\Request;

class ExternalServicesController extends Controller
{

    public function index()
    {
        $sphere_id = auth()->user()->sphere_id;
        $external_services = ExternalServices::where('sphere_id', $sphere_id)->get();
        return inertia('Services/External/Index',compact('external_services'));
    }

    
    public function create()
    {
        return inertia('Services/External/Create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone'  => 'required|string|min:10|max:10',
            'whatsapp'  => 'nullable|string|min:10|max:10',
            'website'  => 'nullable|string',
            'description' => 'nullable|string',
            'is_active'  => 'boolean',
        ]);
        
        
        ExternalServices::create($request->all() + ['sphere_id' => auth()->user()->sphere_id]);

        return redirect()->route('external-services.index');
    }

    
    public function show(ExternalServices $external_service)
    {
        //
    }

    
    public function edit(ExternalServices $external_service)
    {
        return inertia('Services/External/Edit', compact('external_service'));
    }

    
    public function update(Request $request, ExternalServices $external_service)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone'  => 'required|string|min:10|max:10',
            'whatsapp'  => 'nullable|string|min:10|max:10',
            'website'  => 'nullable|string',
            'description' => 'nullable|string',
            'is_active'  => 'boolean',
        ]);
        
        
        $external_service->update($request->all() + ['sphere_id' => auth()->user()->sphere_id]);

        return redirect()->route('external-services.index');
    }

    
    public function destroy(ExternalServices $external_service)
    {
        $external_service->delete();
        return redirect()->route('external-services.index');
    }
}
