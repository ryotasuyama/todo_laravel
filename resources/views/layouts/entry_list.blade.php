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