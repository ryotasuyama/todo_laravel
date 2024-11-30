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