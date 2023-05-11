<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $filters = $request->all('search');

        $my_sphere = auth()->user()->sphere_id;
        $users = UserResource::collection(User::where('sphere_id', $my_sphere)->with('vehicles')->orderBy('id')->filter($filters)
        ->latest()->paginate(30));

        // return $users;

        return inertia('User/Index', compact('users'));
    }

   
    public function create()
    {
        return inertia('User/Create');
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(User $user)
    {
        //
    }

    
    public function edit(User $user)
    {
        //
    }

    
    public function update(Request $request, User $user)
    {
        //
    }

    
    public function destroy(User $user)
    {
        //
    }
}
