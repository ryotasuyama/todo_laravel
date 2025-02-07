<div class="mb-4">
    <label for="tag" class="block text-sm font-medium text-gray-700">カテゴリ</label>
    <select name="tag" id="tag" class="form-select mt-1 block w-full p-2 border border-gray-300 rounded-md">
        <option value="" {{ !isset($entry) ? 'selected' : '' }} {{ isset($entry) ? 'disabled' : '' }}>{{ isset($entry) ? 'タグを選択' : 'カテゴリを選択' }}</option>
        @foreach ($tags as $tag)
            <option value="{{ $tag }}" {{ isset($entry) && $tag == $entry->tag ? 'selected' : '' }}>{{ $tag }}</option>
        @endforeach
    </select>
    @if(!isset($entry))
        <input type="text" name="new_tag" class="form-control mt-2" placeholder="新しいカテゴリを入力">
    @endif
</div>
<div class="mb-4">
    <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
    <input type="text" name="title" id="title" value="{{ $entry->title ?? '' }}" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
</div>
<div class="mb-4">
    <label for="content" class="block text-sm font-medium text-gray-700">本文</label>
    <textarea name="content" id="content" rows="6" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" maxlength="500" required>{{ $entry->content ?? '' }}</textarea>
    <p class="text-sm text-gray-500 mt-1">文字数: <span id="contentLength">{{ isset($entry) ? mb_strlen($entry->content) : '0' }}</span>/500</p>
</div>
<div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 hover:bg-blue-600">{{ isset($entry) ? '保存' : 'ESを追加' }}</button>
</div>

<script>
    document.getElementById('content').addEventListener('input', function() {
        document.getElementById('contentLength').innerText = this.value.length;
    });
</script>
