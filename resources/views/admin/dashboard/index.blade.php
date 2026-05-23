@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-6 text-white shadow-lg shadow-blue-600/15">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-bold mb-1">Xin chào quay trở lại, {{ auth()->user()->name ?? 'Quản trị viên' }}! 👋</h1>
                <p class="text-xs text-blue-100 m-0">Dưới đây là tổng quan số liệu vận hành hệ thống xe đưa đón sân bay hôm nay.</p>
            </div>
            <span class="text-3xl bg-white/10 p-3 rounded-xl backdrop-blur-sm">🚀</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tổng đơn đặt chỗ</span>
                <span class="p-2 bg-blue-50 text-blue-600 rounded-xl text-sm font-bold">📅</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-extrabold text-slate-800">0</span>
                <span class="text-[11px] text-slate-400 font-medium">lượt đặt</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Đơn chờ duyệt</span>
                <span class="p-2 bg-amber-50 text-amber-600 rounded-xl text-sm font-bold">⏳</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-extrabold text-amber-600">0</span>
                <span class="text-[11px] text-amber-500 font-medium">cần duyệt</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tổng doanh thu</span>
                <span class="p-2 bg-emerald-50 text-emerald-600 rounded-xl text-sm font-bold">💰</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-extrabold text-slate-800">0</span>
                <span class="text-xs font-bold text-emerald-600">VND</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tuyến xe hoạt động</span>
                <span class="p-2 bg-indigo-50 text-indigo-600 rounded-xl text-sm font-bold">🗺️</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-extrabold text-slate-800">0</span>
                <span class="text-[11px] text-slate-400 font-medium">tuyến đường</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
            <h3 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">
                📊 Phân rã trạng thái đặt chỗ (Booking Status)
            </h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-600 mb-1">
                        <span>Chờ duyệt (Pending)</span>
                        <span>0</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-amber-500 h-full rounded-full" style="width: 0%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-600 mb-1">
                        <span>Đã xác nhận (Confirmed)</span>
                        <span>0</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full rounded-full" style="width: 0%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-600 mb-1">
                        <span>Đã hủy (Cancelled)</span>
                        <span>0</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-red-500 h-full rounded-full" style="width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
            <h3 class="text-sm font-bold text-slate-800 mb-1 flex items-center gap-2">
                📈 Doanh thu đã xác nhận (7 ngày gần đây)
            </h3>
            <p class="text-[11px] text-slate-400 mb-4">Biểu đồ cột theo dõi biến động dòng tiền</p>
            
            <div class="flex items-end justify-between h-32 pt-2 border-b border-slate-100">
                @for($i = 6; $i >= 0; $i--)
                    <div class="flex flex-col items-center gap-2 flex-1 group">
                        <div class="w-8 bg-slate-100 group-hover:bg-blue-100 rounded-t-md transition-all duration-200 relative" style="height: 10px;">
                            <span class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-slate-700 opacity-0 group-hover:opacity-100 transition-opacity bg-slate-800 text-white px-1.5 py-0.5 rounded shadow">0đ</span>
                        </div>
                        <span class="text-[10px] font-medium text-slate-400">{{ date('d/m', strtotime("-$i days")) }}</span>
                    </div>
                @endfor
            </div>
        </div>

    </div>
</div>
@endsection