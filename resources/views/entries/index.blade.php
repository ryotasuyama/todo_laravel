<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業エントリー管理</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans mx-5 my-4">
    @include('layouts.header')
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mt-5 mb-8">企業エントリー管理</h1>

        <div class="bg-white p-6 rounded shadow mb-8">
            <h2 class="text-xl font-bold mb-4">新規エントリー追加</h2>
            <form action="{{ route('entries.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="company_name" class="block text-sm font-medium text-gray-700">企業名</label>
                    <input type="text" name="company_name" id="company_name" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">ステータス</label>
                    <select name="status" id="status" class="form-select mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        <option value="エントリー済み">エントリー済み</option>
                        <option value="書類選考中">書類選考中</option>
                        <option value="一次面接済み">一次面接済み</option>
                        <option value="内定">内定</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="applied_at" class="block text-sm font-medium text-gray-700">エントリー日</label>
                    <input type="date" name="applied_at" id="applied_at" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="memo" class="block text-sm font-medium text-gray-700">メモ</label>
                    <textarea name="memo" id="memo" rows="4" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">追加</button>
                </div>
            </form>
        </div>

        <form action="{{ route('entries.index') }}" method="GET" class="mb-6">
            <select name="status" onchange="this.form.submit()" class="form-select p-2 border">
                <option value="">全てのステータス</option>
                <option value="エントリー済み" {{ request('status') == 'エントリー済み' ? 'selected' : '' }}>エントリー済み</option>
                <option value="書類選考中" {{ request('status') == '書類選考中' ? 'selected' : '' }}>書類選考中</option>
                <option value="一次面接済み" {{ request('status') == '一次面接済み' ? 'selected' : '' }}>一次面接済み</option>
                <option value="内定" {{ request('status') == '内定' ? 'selected' : '' }}>内定</option>
            </select>
        </form>

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
    </div>
</body>
</html>