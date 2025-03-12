<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display all tasks
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(10);
        return view('tasks.index', compact('tasks'));
    }


    // Create a new task
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:191'
        ]);

        Task::create([
            'description' => $request->description,
            'is_completed' => 0
        ]);

        return redirect()->route('tasks.index');
    }

    // Update task status or description
    public function update(Request $request, Task $task)
    {
        $task->update([
            'description' => $request->description ?? $task->description,
            'is_completed' => $request->has('is_completed') ? 1 : 0
        ]);

        return redirect()->route('tasks.index');
    }

    // Delete a task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    public function clearCompleted()
    {
        Task::where('is_completed', true)->delete();
        return redirect()->route('tasks.index');
    }
}
