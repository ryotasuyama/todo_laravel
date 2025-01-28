<div class="bg-white p-4 rounded shadow mb-6">
    @if($tasks->isEmpty())
    <p>タスクがまだ追加されていません。</p>
    @else
    @foreach ($tasks as $task)
    <div class="flex justify-between items-center mb-4 pb-2">
        <div class="flex items-center gap-4">
            <form action="{{ route('tasks.toggleCompleted', $task->id) }}" method="POST" class="inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="flex items-center">
                    <div class="w-6 h-6 border-2 border-gray-400 rounded flex items-center justify-center {{ $task->completed ? 'bg-blue-500 border-blue-500' : '' }}">
                        @if($task->completed)
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        @endif
                    </div>
                </button>
            </form>
            <div class="{{ $task->completed ? 'line-through text-gray-500' : '' }}">
                <span class="font-semibold text-lg">{{ $task->task_content }}</span> -
                <span class="text-gray-500">{{ $task->due_date }}</span> -
                <span class="text-gray-700">{{ $task->tag }}</span>
            </div>
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
