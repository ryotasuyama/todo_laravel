<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ES管理</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans mx-5 my-4">
    @include('layouts.header')
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mt-5 mb-8">エントリーシート管理</h1>

        <div class="bg-white p-6 rounded shadow mb-8">
            <form action="{{ route('es_entries.store') }}" method="POST" class="mb-6">
                @csrf
                @include('layouts.es_form')
            </form>

            <div class="mb-6">
                <h2 class="text-lg font-bold">カテゴリで絞り込み:</h2>
                <div class="flex space-x-4 mt-2">
                    <a href="{{ route('es_entries.index') }}" class="{{ !isset($filter_tag) ? 'font-bold underline' : '' }}">すべて</a>
                    @foreach ($tags as $availableTag)
                    <a href="{{ route('es_entries.index', ['tag' => $availableTag]) }}" class="
                {{ isset($filter_tag) && $filter_tag === $availableTag ? 'font-bold underline' : '' }}">
                        {{ $availableTag }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>



        <div class="bg-white p-4 rounded shadow">
            @foreach ($esEntries as $entry)
            <div class="mb-4 p-4 border border-gray-200 rounded-md">
                <h2 class="text-lg font-semibold">{{ $entry->title }}</h2>
                <p class="text-gray-500 mb-2">{{ $entry->tag }}</p>
                <p>{{ $entry->content }}</p>
                <p class="text-sm text-gray-500 mt-2">文字数: {{ mb_strlen($entry->content) }}</p><br>
                <div class="flex space-x-6">
                    <a href="{{ route('es_entries.edit', $entry->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">編集</a>
                    <form action="{{ route('es_entries.destroy', $entry->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">削除</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        document.getElementById('content').addEventListener('input', function() {
            document.getElementById('contentLength').innerText = this.value.length;
        });
    </script>
</body>

</html>
