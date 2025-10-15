<?php

// app/Http/Controllers/ProjectController.php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('backend.project.index', compact('projects'));
    }

    public function create()
    {
        return view('backend.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'required|url',
            'technologies' => 'required|array',
            'technologies.*' => 'string'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
        }

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
            'link' => $request->link,
            'technologies' => $request->technologies,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project berhasil ditambahkan');
    }

    public function edit(Project $project)
    {
        return view('backend.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'technologies' => 'required|array',
            'link' => 'required|url',
            'technologies.*' => 'string'
        ]);

        $path = $project->image;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
            'link' => $request->link,
            'technologies' => $request->technologies,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project berhasil diperbarui');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus');
    }
}
