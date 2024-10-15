<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Entry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // すべてのタスクとエントリー中の企業を取得
        $tasks = Task::all();  // タスクの一覧を取得
        $entries = Entry::all();  // エントリー中の企業の一覧を取得

        return view('home', compact('tasks', 'entries'));
    }
}
