<form action="{{ $action }}" method="POST" class="bg-white p-6 rounded shadow">
    @csrf
    @if($method ?? '' == 'PUT')
        @method('PUT')
    @endif
    <div class="mb-4">
        <label for="company_name" class="block text-sm font-medium text-gray-700">企業名</label>
        <input type="text" name="company_name" id="company_name" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('company_name', $entry->company_name ?? '') }}" required>
    </div>
    <div class="mb-4">
        <label for="status" class="block text-sm font-medium text-gray-700">ステータス</label>
        <select name="status" id="status" class="form-select mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            @php
                $statusOptions = [
                    'エントリー済み', '書類通過', 'webテスト通過', '一次面接済み',
                    'GD面接済み', 'ケース面接済み', '二次面接済み', '三次面接済み',
                    '最終面接済み', '内定'
                ];
            @endphp
            @foreach($statusOptions as $option)
                <option value="{{ $option }}" {{ (old('status', $entry->status ?? '') == $option) ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="applied_at" class="block text-sm font-medium text-gray-700">エントリー日</label>
        <input type="date" name="applied_at" id="applied_at" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('applied_at', $entry->applied_at ?? '') }}">
    </div>
    <div class="mb-4">
        <label for="next_interview_date" class="block text-sm font-medium text-gray-700">次回選考日</label>
        <input type="date" name="next_interview_date" id="next_interview_date" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('next_interview_date', $entry->next_interview_date ?? '') }}">
    </div>
    <div class="mb-4">
        <label for="result_notification_date" class="block text-sm font-medium text-gray-700">合否通知日</label>
        <input type="date" name="result_notification_date" id="result_notification_date" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('result_notification_date', $entry->result_notification_date ?? '') }}">
    </div>
    <div class="mb-4">
        <label for="memo" class="block text-sm font-medium text-gray-700">メモ</label>
        <textarea name="memo" id="memo" rows="4" class="form-input mt-1 block w-full p-2 border border-gray-300 rounded-md">{{ old('memo', $entry->memo ?? '') }}</textarea>
    </div>
    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ $submitButtonText ?? '保存' }}
        </button>
    </div>
</form>
