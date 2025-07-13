<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('projects.tasks.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $project->tasks()->create($request->validate([
            'title' => 'required|string|min:3|max:30',
            'description' => 'nullable|min:3|max:255',
            'deadline' => 'required|date|after_or_equal:today'
        ]));

        return redirect()->route('projects.show', compact('project'))->with('success', 'Task successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('projects.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->validate([
                    'title' => 'sometimes|string|min:3|max:30',
                    'description' => 'nullable|min:3|max:255',
                    'deadline' => 'sometimes|date|after_or_equal:today'
                ]));

        return redirect()->route('projects.show', ['project' => $task->project])->with('success', 'Task successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with('success', 'Task successfully deleted!');
    }

    public function toggleComplete(Task $task)
    {
        $task->update([
            'is_completed' => !$task->is_completed
        ]);

        $message = $task->is_completed ? 'The task marked is complete!' : 'Task status is returned.';
        return redirect()->back()->with('success', $message);
    }
}
