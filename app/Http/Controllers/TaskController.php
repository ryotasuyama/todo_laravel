<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderByDueDate()->get();
        $allTasks = Task::all();
        return view('tasks.index', compact('tasks', 'allTasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required|string|max:255',
            'due_date' => 'required|date',
            'task_content' => 'required|string|max:255',
        ]);

        Task::create([
            'tag' => $request->tag,
            'due_date' => $request->due_date,
            'task_content' => $request->task_content,
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect()->route('tasks.index');
    }

    public function filterByTag($tag)
{
    $tasks = Task::where('tag', $tag)->get();

    $allTasks = Task::all();
    $selectedTag = $tag;
    return view('tasks.index', compact('tasks', 'selectedTag', 'allTasks'));
}
}
