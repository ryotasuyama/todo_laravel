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
            @include('layouts.entries_form', [
                'action' => route('entries.store'),
                'submitButtonText' => '追加'
            ])
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
