<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業エントリー編集</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans mx-5 my-4">
    
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mt-5 mb-8">企業エントリー編集</h1>

        <form action="{{ route('entries.update', $entry->id) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="company_name" class="block text-sm font-medium text-gray-700">企業名</label>
                <input type="text" name="company_name" id="company_name" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ $entry->company_name }}" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">ステータス</label>
                <select name="status" id="status" class="form-select mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    <option value="エントリー済み" {{ $entry->status == 'エントリー済み' ? 'selected' : '' }}>エントリー済み</option>
                    <option value="書類選考中" {{ $entry->status == '書類選考中' ? 'selected' : '' }}>書類選考中</option>
                    <option value="一次面接済み" {{ $entry->status == '一次面接済み' ? 'selected' : '' }}>一次面接済み</option>
                    <option value="内定" {{ $entry->status == '内定' ? 'selected' : '' }}>内定</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="applied_at" class="block text-sm font-medium text-gray-700">エントリー日</label>
                <input type="date" name="applied_at" id="applied_at" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ $entry->applied_at }}">
            </div>
            <div class="mb-4">
                <label for="memo" class="block text-sm font-medium text-gray-700">メモ</label>
                <textarea name="memo" id="memo" rows="4" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md">{{ $entry->memo }}</textarea>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">更新</button>
            </div>
        </form>
    </div>
</body>

</html>