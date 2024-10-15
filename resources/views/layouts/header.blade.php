<nav class="bg-gray-100 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-bold text-black">就活管理アプリ</h1>

        <ul class="flex space-x-4">
            <li><a href="{{ route('home') }}" class="text-black hover:underline">ホーム</a></li>
            <li><a href="{{ route('tasks.index') }}" class="text-black hover:underline">タスク管理</a></li>
            <li><a href="{{ route('es_entries.index') }}" class="text-black hover:underline">ES管理</a></li>
            <li><a href="{{ route('entries.index') }}" class="text-black hover:underline">応募管理</a></li>
        </ul>
    </div>
</nav>