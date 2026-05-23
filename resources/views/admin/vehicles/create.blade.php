<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden w-full">
        <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
            <div>
                <h3 class="text-base font-bold text-slate-800 mb-1">Thêm phương tiện mới</h3>
                <p class="text-xs text-slate-500 m-0">Điền thông tin chi tiết để thêm xe đưa đón vào hệ thống</p>
            </div>
            <a href="{{ route('admin.vehicles.index') }}" class="text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-xl no-underline transition">
                ← Quay lại danh sách
            </a>
        </div>

        <form action="{{ route('admin.vehicles.store') }}" method="POST" enctype="multipart/form-data" class="p-6 m-0 space-y-5">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tên / Dòng xe <span class="text-red-500">*</span></label>
                <input type="text" name="model" required placeholder="Ví dụ: Toyota Innova 2023, Ford Transit..." 
                    class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Biển số xe <span class="text-red-500">*</span></label>
                    <input type="text" name="license_plate" required placeholder="Ví dụ: 30H-123.45" 
                        class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition font-mono uppercase">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Số ghế ngồi <span class="text-red-500">*</span></label>
                    <input type="number" name="capacity" required placeholder="Ví dụ: 4, 7, 16..." 
                        class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Hình ảnh phương tiện</label>
                <div class="border border-dashed border-slate-200 rounded-xl p-4 bg-slate-50/50 flex items-center justify-between">
                    <input type="file" name="image" class="text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Trạng thái hoạt động</label>
                <select name="status" class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition bg-white cursor-pointer">
                    <option value="active">Đang hoạt động (Active)</option>
                    <option value="inactive">Tạm dừng hoạt động (Inactive)</option>
                </select>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-md shadow-blue-500/20 transition cursor-pointer">
                    💾 Lưu phương tiện
                </button>
            </div>
        </form>
    </div>
</x-app-layout>