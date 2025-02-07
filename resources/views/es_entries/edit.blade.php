<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ES管理 - 編集</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans mx-5 my-4">
    <div class="container mx-auto p-4">
        <div class="mb-6">
            <a href="{{ route('es_entries.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">戻る</a>
        </div>
        <h1 class="text-3xl font-bold mt-5 mb-8">エントリーシート編集</h1>
        <div class="bg-white p-6 rounded shadow mb-8">
            <form action="{{ route('es_entries.update', $entry->id) }}" method="POST" class="mb-6">
                @csrf
                @method('PUT')
                @include('layouts.es_form')
            </form>
        </div>
    </div>

    <script>
        document.getElementById('content').addEventListener('input', function() {
            document.getElementById('contentLength').innerText = this.value.length;
        });
    </script>
</body>

</html>