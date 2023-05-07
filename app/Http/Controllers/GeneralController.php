<?php

namespace App\Http\Controllers;

use App\Http\Resources\IncedentResource;
use App\Http\Resources\ResidentPermissionResource;
use App\Models\Incident;
use App\Models\ResidentPermission;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        return inertia('General/Index');
    }

    public function documents()
    {
        return inertia('General/Documents/Index');
    }
    public function documentCreate()
    {
        return inertia('General/Documents/Create');
    }

    public function guardHouseChat()
    {
        return inertia('General/GuardHouseChat/Index');
    }

    public function reportIncident()
    {
        $my_sphere = auth()->user()->sphere_id;
        $incidents = IncedentResource::collection(Incident::where('sphere_id', $my_sphere)->with('user')->latest()->get());

        return inertia('General/ReportIncident/Index', compact('incidents'));
    }

    public function incidentSolved(Incident $incident)
    {
       return $incident;
        $incident->is_solved = true;
        $incident->save();
        $incident->iupdated_at = now();
        $incident->save();

        return to_route('general.report-incident');
    }

    public function surveys()
    {
        return inertia('General/Surveys/Index');
    }

    public function permissions()
    {
        $user_id = auth()->id();
        $resident_permissions = ResidentPermissionResource::collection(ResidentPermission::where('user_id', $user_id)->with('permissionType')->get());
        return inertia('General/Permissions/Index', compact('resident_permissions'));
    }

    public function suggestions()
    {
        return inertia('General/Suggestions/Index');
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
