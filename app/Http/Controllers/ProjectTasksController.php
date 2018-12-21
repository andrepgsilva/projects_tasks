<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $validated = request()->validate([
            'description' => ['required', 'min:3']
        ]);

        $project->addTask($validated);
        return back();
    }
}
