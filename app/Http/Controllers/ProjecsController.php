<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjecsController extends Controller
{
    
    public function index()
    {
        $projects = Project::with('user', 'clients')->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $personnels = User::pluck('full_name', 'id');
        $clients = Client::pluck('company_name', 'id');
        return view('projects.create', compact('personnels', 'clients'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:open,in_progress,on_hold,completed,cancelled',
            'clients' => 'required|array',
            'clients.*' => 'integer|exists:clients,id',
        ]);

       $projects =  Project::create([
        'name' => $validated['name'],
        'user_id' => $validated['user_id'],
        'description' => $validated['description'] ?? null,
        'start_date' => $validated['start_date'] ?? null,
        'end_date' => $validated['end_date'] ?? null,
        'status' => $validated['status'],
       ]);

       $projects->clients()->attach($validated['clients']); 

        return redirect()->route('projects.index')->with('success', 'Project Created Successfully.');

    }

}
