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

        @include('layouts.entries_form', [
            'action' => route('entries.update', $entry->id),
            'method' => 'PUT',
            'entry' => $entry,
            'submitButtonText' => '更新'
        ])
    </div>
</body>

</html>
