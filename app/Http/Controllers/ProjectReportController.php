<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ProjectReportController extends Controller
{
    

    public function generate()
    {
        $projects = Project::with('clients', 'tasks')->get();
        $pdf = Pdf::loadView('reports.projects', compact('projects'));

        return $pdf->download('projects_report.pdf');
    }
}
