<!-- resources/views/es_entries/edit.blade.php -->
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

        <form action="{{ route('es_entries.update', $entry->id) }}" method="POST" class="mb-6">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="tag" class="block text-sm font-medium text-gray-700">企業タグ</label>
                <select name="tag" id="tag" class="form-select mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="" disabled>タグを選択</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag }}" {{ $tag == $entry->tag ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
                <input type="text" name="title" id="title" value="{{ $entry->title }}" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">本文</label>
                <textarea name="content" id="content" rows="6" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" maxlength="500" required>{{ $entry->content }}</textarea>
                <p class="text-sm text-gray-500 mt-1">文字数: <span id="contentLength">{{ mb_strlen($entry->content) }}</span>/500</p>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 hover:bg-blue-600">保存</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('content').addEventListener('input', function() {
            document.getElementById('contentLength').innerText = this.value.length;
        });
    </script>
</body>

</html>
