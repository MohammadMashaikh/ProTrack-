<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PersonnelController extends Controller
{
    

    public function index()
    {
        $personnels = User::with(['projects', 'tasks', 'clients'])->paginate(10);

        return view('users.index', compact('personnels'));
    }


    public function create()
    {
        $permissions = Permission::all();
        return view('users.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
        'role' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
        'phone' => 'nullable|string|max:20',
        'status' => 'required|in:Active,Inactive',
        'permissions' => 'nullable|array',
        'permissions.*' => 'exists:permissions,id',
     ]);
     
     $fullName = $request->first_name . ' ' . $request->last_name;

     $user = User::create([
        'role' => $validated['role'],
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'full_name' => $fullName,
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'phone' => $validated['phone'] ?? null,
        'status' => $validated['status'],
      ]);

       if (!empty($validated['permissions'])) {
        $permissionNames = Permission::whereIn('id',  $validated['permissions'])->pluck('name')->toArray();
        $user->givePermissionTo($permissionNames);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');


    }

}
