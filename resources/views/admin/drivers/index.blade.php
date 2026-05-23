<x-app-layout>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden w-full">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <div>
                <h3 class="text-base font-bold text-slate-800 mb-1">Quản lý tài xế</h3>
                <p class="text-xs text-slate-500 m-0">Hồ sơ tài xế, số điện thoại liên hệ và giấy phép lái xe</p>
            </div>
            <a href="{{ route('admin.drivers.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-md shadow-blue-500/20 transition duration-200 flex items-center gap-2 no-underline">
                ➕ Thêm tài xế mới
            </a>
        </div>

        <div class="overflow-x-auto w-full">
            <table class="w-full text-left border-collapse m-0">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Họ và tên</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Số điện thoại</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Số bằng lái (License)</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($drivers as $driver)
                        <tr class="hover:bg-slate-50/80 transition duration-150">
                            <td class="p-4 font-semibold text-slate-700">👨‍✈️ {{ $driver->name }}</td>
                            <td class="p-4 text-slate-600 font-medium">{{ $driver->phone }}</td>
                            <td class="p-4 text-slate-500 font-mono text-xs">{{ $driver->license_number }}</td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.drivers.edit', $driver) }}" class="text-xs font-bold text-amber-600 bg-amber-50 hover:bg-amber-100 border border-amber-200/60 px-3 py-1.5 rounded-lg no-underline transition">Sửa ✏️</a>
                                    <form action="{{ route('admin.drivers.destroy', $driver) }}" method="POST" class="m-0" onsubmit="return confirm('Xóa tài xế này?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-xs font-bold text-red-600 bg-red-50 hover:bg-red-100 border border-red-200/60 px-3 py-1.5 rounded-lg transition cursor-pointer">Xóa 🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="p-8 text-center text-slate-400 font-medium">📭 Chưa có tài xế nào trong danh sách.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>