<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $loggedInUser = Auth::user()->id;
        $user = User::find($loggedInUser);

        $userprojectsCount = $user->projects->count();
        $userclientsCount = $user->clients->count();
        $usertasksCount = $user->tasks->count();
        $userinProgressProjects = $user->projects->where('status', 'in_progress')->count();

        $projectsCount = Project::count();
        $clientsCount = Client::count();
        $tasksCount = Task::count();
        $usersCount = User::count();
        $totalInProgressProjects = Project::where('status', 'in_progress')->count();

        $projectsPerMonth = [];

        for ($i = 1; $i <= 12; $i++) {
            $projectsPerMonth[] = \App\Models\Project::whereMonth('created_at', $i)->count();
        }

        $projects = Project::latest()->take(8)->get();

        // Top 6 projects with most tasks
            $topProjects = Project::withCount('tasks')
                ->orderBy('tasks_count', 'desc')
                ->take(6)
                ->get();

            $projectNames = $topProjects->pluck('name')->toArray();
            $taskCounts = $topProjects->pluck('tasks_count')->toArray();


        return view('dashboard', compact(
            'userprojectsCount', 
            'userclientsCount',
             'usertasksCount', 
             'userinProgressProjects',
              'projectsCount', 
              'clientsCount', 
              'tasksCount', 
              'totalInProgressProjects', 
              'usersCount', 
              'projectsPerMonth', 
              'projects', 
              'projectNames', 
              'taskCounts'
        ));

    }
}
