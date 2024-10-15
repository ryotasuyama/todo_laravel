<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスク管理</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans mx-5 my-4">
    @include('layouts.header')
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mt-5 mb-8">タスク管理</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="mb-4">
                <label for="tag" class="block text-sm font-medium text-gray-700">タグ</label>
                <select name="tag" id="tag" class="form-select mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="大学">大学</option>
                    <option value="就活">就活</option>
                    <option value="バイト">バイト</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="due_date" class="block text-sm font-medium text-gray-700">期日</label>
                <input type="date" name="due_date" id="due_date" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="task_content" class="block text-sm font-medium text-gray-700">タスク内容</label>
                <input type="text" name="task_content" id="task_content" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="タスク内容" required>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 hover:bg-blue-600">タスクを追加</button>
            </div>
        </form>

        <div class="mb-6">
            <a href="{{ route('es_entries.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 hover:bg-gray-600">ES管理</a>
            <a href="{{ route('entries.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 hover:bg-gray-600">応募管理</a>
        </div>

        <div class="mb-6">
            <h2 class="text-lg font-bold">タグで絞り込み:</h2>
            <div class="flex space-x-4 mt-2">
                <a href="{{ route('tasks.index') }}" class="{{ !isset($selectedTag) ? 'font-bold underline' : '' }}">すべて</a>
                @foreach ($allTasks->pluck('tag')->unique() as $availableTag)
                <a href="{{ route('tasks.filterByTag', $availableTag) }}" class="{{ isset($selectedTag) && $selectedTag === $availableTag ? 'font-bold underline' : '' }}">
                    {{ $availableTag }}
                </a>
                @endforeach
            </div>
        </div>

        <div class="bg-white p-4 rounded shadow">
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
        </div>
    </div>
</body>

</html>