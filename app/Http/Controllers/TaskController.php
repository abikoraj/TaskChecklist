<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();
        if ($request->has('filter') && $request->filter === 'completed') {
            $query->where('status', true);
        } elseif ($request->has('filter') && $request->filter === 'incomplete') {
            $query->where('status', false);
        }
        $tasks = $query->latest()->get();
        $totalTasks = Task::count();
        $completedTasks = Task::where('status', true)->count();
        $percentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
        $completionPercentage = round($percentage);
        return view('tasks.index', compact('tasks', 'completionPercentage'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        return response()->json($task);
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

    public function toggleStatus(Task $task)
    {
        // Toggle task status
        if ($task->status == 1) {
            $task->update(['status' => 0]);
        } else {
            $task->update(['status' => 1]);
        }
    
        // Calculate the completion percentage
        $totalTasks = Task::count();
        $completedTasks = Task::where('status', true)->count();
        $completionPercentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
    
        return response()->json([
            'status' => 'success',
            'completionPercentage' => round($completionPercentage)
        ]);
    }
}
