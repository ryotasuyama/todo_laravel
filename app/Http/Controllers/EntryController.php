<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status');

        $entries = Entry::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->get();

        return view('entries.index', compact('entries', 'status'));
    }

    public function create()
    {
        return view('entries.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'next_interview_date' => 'nullable|date',
            'result_notification_date' => 'nullable|date',
            'memo' => 'nullable|string',
        ]);

        Entry::create($validated);

        return redirect()->route('entries.index')->with('success', 'エントリーを追加しました');
    }


    public function edit(Entry $entry)
    {
        return view('entries.edit', compact('entry'));
    }


    public function update(Request $request, Entry $entry)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'next_interview_date' => 'nullable|date', 
            'result_notification_date' => 'nullable|date',
            'memo' => 'nullable|string',
        ]);

        $entry->update($validated);

        return redirect()->route('entries.index')->with('success', 'エントリーを更新しました');
    }

    public function destroy(Entry $entry)
    {
        $entry->delete();

        return redirect()->route('entries.index')->with('success', 'エントリーを削除しました');
    }
}
