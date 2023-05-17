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
        $request->validate([
            'name' => 'required|max:190',
            'password' => 'required',
            'phone' => 'nullable|max:10|min:10',
            'is_active' => 'boolean',
        ]);

        User::create($request->except('password') + [
            'password' => bcrypt($request->password),
            'sphere_id' => auth()->user()->sphere_id
        ]);

        return to_route('users.index');
    }

    
    public function show(User $user)
    {
        //
    }

    
    public function edit(User $user)
    {

        // return $user;
        return inertia('User/Edit', compact('user'));
    }

    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:190',
            'phone' => 'nullable|max:10|min:10',
        ]);

        $user->update($request->all() + [
            'is_active' => $request->is_active
        ]);

        return to_route('users.index');
    }

    
    public function destroy(User $user)
    {
        $user->delete();
        request()->session()->flash('flash.banner', 'Se eliminó correctamente');
        request()->session()->flash('flash.bannerStyle', 'success');
        return to_route('users.index');
    }
}
