<!-- resources/views/tasks/index.blade.php -->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoアプリ</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">ToDoアプリ</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="mb-4">
                <select name="tag" class="form-select">
                    <option value="大学">大学</option>
                    <option value="就活">就活</option>
                    <option value="バイト">バイト</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="mb-4">
                <input type="date" name="due_date" class="form-input" required>
            </div>
            <div class="mb-4">
                <input type="text" name="task_content" class="form-input" placeholder="タスク内容" required>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">タスクを追加</button>
            </div>
        </form>

        <div class="bg-white p-4 rounded shadow">
            @foreach ($tasks as $task)
            <div class="flex justify-between items-center mb-2">
                <div>
                    <span class="font-bold">{{ $task->tag }}</span> -
                    <span>{{ $task->due_date }}</span> -
                    <span>{{ $task->task_content }}</span>
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