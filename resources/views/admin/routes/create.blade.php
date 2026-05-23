@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-base font-bold text-slate-800 mb-1">➕ Thêm tuyến đường mới</h3>
        <p class="text-xs text-slate-500 m-0">Điền thông tin lộ trình và giá vé cho tuyến xe đưa đón</p>
    </div>

    <form action="{{ route('admin.routes.store') }}" method="POST" class="p-6 space-y-5 m-0">
        @csrf
        <div>
            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Tên tuyến đường</label>
            <input type="text" name="name" required placeholder="Ví dụ: Sân bay Nội Bài - Quận Hoàn Kiếm" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white rounded-xl px-4 py-2.5 text-sm outline-none transition">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Điểm đón (Pickup)</label>
                <input type="text" name="pickup_point" required placeholder="Ví dụ: Ga T1 Sân bay" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white rounded-xl px-4 py-2.5 text-sm outline-none transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Điểm trả (Dropoff)</label>
                <input type="text" name="dropoff_point" required placeholder="Ví dụ: Nhà hát Lớn" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white rounded-xl px-4 py-2.5 text-sm outline-none transition">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Giá vé (VND)</label>
            <input type="number" name="price" required placeholder="Ví dụ: 250000" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white rounded-xl px-4 py-2.5 text-sm outline-none transition">
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
            <a href="/admin/routes" class="text-xs font-bold text-slate-500 bg-slate-100 hover:bg-slate-200 px-4 py-2.5 rounded-xl no-underline transition">Hủy bỏ</a>
            <button type="submit" class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-5 py-2.5 rounded-xl shadow-md shadow-blue-500/10 transition cursor-pointer border-0">Lưu tuyến đường</button>
        </div>
    </form>
</div>
@endsection