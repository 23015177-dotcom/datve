<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden w-full">
        <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
            <div>
                <h3 class="text-base font-bold text-slate-800 mb-1">Thêm tài xế mới</h3>
                <p class="text-xs text-slate-500 m-0">Tạo hồ sơ nhân sự, số điện thoại liên hệ và thông tin bằng lái cho tài xế mới</p>
            </div>
            <a href="{{ route('admin.drivers.index') }}" class="text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-xl no-underline transition">
                ← Quay lại danh sách
            </a>
        </div>

        <form action="{{ route('admin.drivers.store') }}" method="POST" class="p-6 m-0 space-y-5">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Họ và tên tài xế <span class="text-red-500">*</span></label>
                <input type="text" name="name" required placeholder="Ví dụ: Nguyễn Văn A, Trần Văn B..." 
                    class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Số điện thoại liên hệ <span class="text-red-500">*</span></label>
                    <input type="text" name="phone" required placeholder="Ví dụ: 0912345678" 
                        class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition font-mono">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Số giấy phép lái xe (GPLX) <span class="text-red-500">*</span></label>
                    <input type="text" name="license_number" required placeholder="Ví dụ: GPLX-99999..." 
                        class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition font-mono uppercase">
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-md shadow-blue-500/20 transition cursor-pointer">
                    💾 Lưu thông tin tài xế
                </button>
            </div>
        </form>
    </div>
</x-app-layout>