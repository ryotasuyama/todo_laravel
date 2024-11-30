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
                        <option value="書類通過">書類通過</option>
                        <option value="webテスト通過">webテスト通過</option>
                        <option value="一次面接済み">一次面接済み</option>
                        <option value="GD面接済み">GD面接済み</option>
                        <option value="ケース面接済み">ケース面接済み</option>
                        <option value="二次面接済み">二次面接済み</option>
                        <option value="三次面接済み">三次面接済み</option>
                        <option value="最終面接済み">最終面接済み</option>
                        <option value="内定">内定</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="next_interview_date" class="block text-sm font-medium text-gray-700">次回選考日</label>
                    <input type="date" name="next_interview_date" id="next_interview_date" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="result_notification_date" class="block text-sm font-medium text-gray-700">合否通知日</label>
                    <input type="date" name="result_notification_date" id="result_notification_date" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md">
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

        <div class="mb-6">
            <h2 class="text-lg font-bold">ステータスで絞り込み:</h2>
            <div class="flex space-x-4 mt-2">
                <a href="{{ route('entries.index') }}" class="{{ !isset($filter_status) ? 'font-bold underline' : '' }}">すべて</a>
                @foreach ($status as $availableStatus)
                <a href="{{ route('entries.index', ['status' => $availableStatus]) }}" class="
                {{ isset($filter_status) && $filter_status === $availableStatus ? 'font-bold underline' : '' }}">
                    {{ $availableStatus }}
                </a>
                @endforeach
            </div>
        </div>

        @include('layouts.entry_list')

    </div>
</body>

</html>