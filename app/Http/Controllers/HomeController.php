<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Entry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tasks = Task::orderByDueDate()->get();
        $entries = Entry::all(); 

        return view('home', compact('tasks', 'entries'));
    }
}
