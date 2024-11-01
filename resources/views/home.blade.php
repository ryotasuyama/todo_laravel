<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans mx-5 my-4">

    @include('layouts.header')

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mt-5 mb-8">ホーム画面</h1>

        <h2 class="text-2xl font-semibold mb-4">タスク一覧</h2>
        <div class="bg-white p-4 rounded shadow mb-6">
            @if($tasks->isEmpty())
            <p>タスクがまだ追加されていません。</p>
            @else
            @foreach ($tasks as $task)
            <div class="flex justify-between items-center mb-4 pb-2">
                <div>
                    <span class="font-semibold text-lg">{{ $task->task_content }}</span> -
                    <span class="text-gray-500">{{ $task->due_date }}</span> -
                    <span class="text-gray-700">{{ $task->tag }}</span>
                </div>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">削除</button>
                </form>
            </div>
            @endforeach
            @endif
        </div>

        <h2 class="text-2xl font-semibold mb-6">企業一覧</h2>
        <div class="bg-white p-4 rounded shadow">
            @if($entries->isEmpty())
            <p>エントリー中の企業がまだありません。</p>
            @else
            <div class="bg-white p-4 rounded shadow">
                @foreach ($entries as $entry)
                <div class="flex justify-between items-center mb-4 p-4 border-b border-gray-200">
                    <div>
                        <h2 class="text-lg font-semibold">{{ $entry->company_name }}</h2>
                        <p class="text-gray-500">{{ $entry->status }}</p>
                        <p class="text-gray-500">エントリー日: {{ $entry->applied_at }}</p>
                        <p class="text-gray-500">メモ: {{ $entry->memo }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('entries.edit', $entry->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">編集</a>
                        <form action="{{ route('entries.destroy', $entry->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">削除</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

</body>

</html>