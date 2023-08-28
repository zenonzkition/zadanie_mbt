<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id','desc')->paginate(25);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'begin_date' => 'required',
            'end_date' => 'required',
            'file' => 'mimes:png,jpg,pdf|max:2048'
        ]);

        $project = Project::create($request->post());

        if ($request->file()) {
            $fileName = time() . '.' . $request->file->extension();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $project->attachment = '/storage/' . $filePath;
            $project->save();
        }
        
        return redirect()->route('projects.index')->with('success', 'Projekt został poprawnie zapisany.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|max:255',
            'begin_date' => 'required',
            'end_date' => 'required',
            'file' => 'mimes:png,jpg,pdf|max:2048'
        ]);

        $project->fill($request->post())->save();

        if ($request->file()) {
            $fileName = time() . '.' . $request->file->extension();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $project->attachment = '/storage/' . $filePath;
            $project->save();
        }
        
        return redirect()->route('projects.index')->with('success', 'Projekt został poprawnie zapisany.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Projekt został usunięty.');
    }
}
