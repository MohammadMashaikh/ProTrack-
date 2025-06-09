<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    

    public function index()
    {
        $tasks = Task::with('user', 'project')->paginate(10);

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        $personnels = User::pluck('full_name', 'id');
        $projects = Project::pluck('name', 'id');

        return view('tasks.create', compact('personnels', 'projects'));
    }


    public function store(Request $request)
    {
       $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after:start_date',
            'assigned_to' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'status' => 'required|in:todo,in_progress,done,cancelled',
            'priority' => 'required|in:low,medium,high,urgent,outage'
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
    }

}
