<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        if ($filter == 'completed') {
            $projects = Project::where('status', 'completed')->get();
        } elseif ($filter == 'incomplete') {
            $projects = Project::where('status', 'incomplete')->get();
        } else {
            $projects = Project::all();
        }

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load('donations.user', 'reports.user');
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric|min:0',
        ]);

        $project = new Project();
        $project->user_id = Auth::id();
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->goal_amount = $request->input('goal_amount');
        $project->current_amount = 0;
        $project->status = 'incomplete';
        $project->save();

        return redirect()->route('projects.show', $project);
    }
}

