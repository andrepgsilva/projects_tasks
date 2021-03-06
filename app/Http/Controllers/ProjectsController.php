<?php

namespace App\Http\Controllers;

use App\Project;
use App\Mail\ProjectCreated;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProject;
use Illuminate\Support\Facades\Mail;

class ProjectsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');    
    }

    public function index()
    {
        $projects = Project::where('owner_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    public function create() 
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.show', compact('project'));
    }

    public function store(StoreProject $request)
    {   
        $attributes = $request->validated();
        $attributes['owner_id'] = auth()->id();
        Project::create($attributes);
        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project, StoreProject $request)
    {   
        $project->update($request->validated());
        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');   
    }
}