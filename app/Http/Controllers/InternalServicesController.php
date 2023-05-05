<?php

namespace App\Http\Controllers;

use App\Models\InternalServices;
use Illuminate\Http\Request;

class InternalServicesController extends Controller
{
  
    public function index()
    {
        $sphere_id = auth()->user()->sphere_id;
        $internal_services = InternalServices::where('sphere_id', $sphere_id)->get();
        return inertia('Services/Internal/Index',compact('internal_services'));
    }

   
    public function create()
    {
        return inertia('Services/Internal/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone'  => 'required|string|min:10|max:10',
            'whatsapp'  => 'nullable|string|min:10|max:10',
            'description' => 'nullable|string',
            'is_active'  => 'boolean',
        ]);
        
        InternalServices::create($request->all() + ['sphere_id' => auth()->user()->sphere_id]);

        return redirect()->route('internal-services.index');
    }

    
    public function show(InternalServices $internalService)
    {
        //
    }

    
    public function edit(InternalServices $internal_service)
    {
        return inertia('Services/Internal/Edit',compact('internal_service'));
    }

    
    public function update(Request $request, InternalServices $internal_service)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone'  => 'required|string|min:10|max:10',
            'whatsapp'  => 'nullable|string|min:10|max:10',
            'description' => 'nullable|string',
            'is_active'  => 'boolean',
        ]);
        
        
        $internal_service->update($request->all() + ['sphere_id' => auth()->user()->sphere_id]);

        return redirect()->route('internal-services.index');
    }

   
    public function destroy(InternalServices $internal_service)
    {
        $internal_service->delete();
        return redirect()->route('internal-services.index');
    }
}
