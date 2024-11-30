<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans mx-5 my-4">

    @include('layouts.header')

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mt-5 mb-8">ホーム画面</h1>

        <h2 class="text-2xl font-semibold mb-4">タスク一覧</h2>
        @include('layouts.task_list')

        <h2 class="text-2xl font-semibold mb-6">企業一覧</h2>
        @include('layouts.entry_list')

    </div>
</body>

</html>