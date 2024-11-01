<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Entry;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        $entries = Entry::all();

        $events = [];

        foreach ($tasks as $task) {
            if ($task->due_date) {
                $events[] = [
                    'title' => $task->task_content,
                    'start' => $task->due_date,
                    'allDay' => true,
                ];
            }
        }

        foreach ($entries as $entry) {
            if ($entry->next_interview_date) {
                $events[] = [
                    'title' => $entry->company_name . ' - 次回選考日',
                    'start' => $entry->next_interview_date,
                    'allDay' => true,
                ];
            }
        }    
    
        foreach ($entries as $entry) {    
            if ($entry->result_notification_date) {
                $events[] = [
                    'title' => $entry->company_name . ' - 合否通知日',
                    'start' => $entry->result_notification_date,
                    'allDay' => true,
                ];
            }
        }

        return view('calendar.index', compact('events'));
    }
}
