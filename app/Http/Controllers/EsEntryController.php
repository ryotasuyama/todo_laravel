<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EsEntry;

class EsEntryController extends Controller
{
    public function index(Request $request)
    {
        $filter_tag = $request->input('tag');

        if ($filter_tag) {
            $esEntries = EsEntry::where('tag', $filter_tag)->get();
        } else {
            $esEntries = EsEntry::all();
        }

        $tags = EsEntry::select('tag')->distinct()->pluck('tag');
        return view('es_entries.index', compact('esEntries', 'tags','filter_tag'));
    }

    public function store(Request $request)
    {
        $tag = $request->input('tag') ?: $request->input('new_tag');

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:500',
        ]);

        EsEntry::create([
            'tag' => $tag,
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('es_entries.index');
    }

    public function destroy($id)
    {
        $entry = EsEntry::findOrFail($id);
        $entry->delete();

        return redirect()->route('es_entries.index');
    }

    public function edit($id)
{
    $entry = EsEntry::findOrFail($id);
    $tags = EsEntry::select('tag')->distinct()->pluck('tag');
    return view('es_entries.edit', compact('entry', 'tags'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'tag' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'content' => 'required|string|max:500',
    ]);

    $entry = EsEntry::findOrFail($id);
    $entry->update($validated);

    return redirect()->route('es_entries.index')->with('success', 'エントリーシートが更新されました');
}
}
