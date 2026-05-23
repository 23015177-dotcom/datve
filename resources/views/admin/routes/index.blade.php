<x-admin-layout>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Route management</h1>
        <a href="{{ route('admin.routes.create') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-primary-dark">Add new</a>
    </div>

    @if(session('success'))
        <x-ui.alert type="success">{{ session('success') }}</x-ui.alert>
    @endif

    <x-ui.table class="w-full">
        <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
            <tr>
                <th class="px-4 py-3">Route name</th>
                <th class="px-4 py-3">Pickup point</th>
                <th class="px-4 py-3">Dropoff point</th>
                <th class="px-4 py-3">Price</th>
                <th class="px-4 py-3">Status</@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
    
    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
        <div>
            <h3 class="text-base font-bold text-slate-800 mb-1">Danh sách tuyến đường</h3>
            <p class="text-xs text-slate-500 m-0">Quản lý toàn bộ lịch trình và lộ trình đưa đón sân bay</p>
        </div>
        <a href="{{ route('admin.routes.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-md shadow-blue-500/20 transition duration-200 flex items-center gap-2 no-underline">
            ➕ Thêm tuyến mới
        </a>
    </div>

    <div class="overflow-x-auto w-full">
        <table class="w-full text-left border-collapse m-0">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Tên tuyến đường</th>
                    <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Điểm đón (Pickup)</th>
                    <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Điểm trả (Dropoff)</th>
                    <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Giá vé (VND)</th>
                    <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Trạng thái</th>
                    <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">Hành động</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($routes as $route)
                    <tr class="hover:bg-slate-50/80 transition duration-150">
                        <td class="p-4 font-semibold text-slate-700">{{ $route->name }}</td>
                        <td class="p-4 text-slate-600">{{ $route->pickup_point }}</td>
                        <td class="p-4 text-slate-600">{{ $route->dropoff_point }}</td>
                        <td class="p-4 font-bold text-emerald-600">{{ number_format($route->price) }}đ</td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Hoạt động
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.routes.edit', $route) }}" class="text-xs font-bold text-amber-600 bg-amber-50 hover:bg-amber-100 border border-amber-200/60 px-3 py-1.5 rounded-lg no-underline transition">
                                    Sửa ✏️
                                </a>
                                <form action="{{ route('admin.routes.destroy', $route) }}" method="POST" class="m-0" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tuyến này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-red-600 bg-red-50 hover:bg-red-100 border border-red-200/60 px-3 py-1.5 rounded-lg transition cursor-pointer">
                                        Xóa 🗑️
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-slate-400 font-medium">
                            📭 Hiện tại chưa có tuyến đường nào được tạo.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($routes->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50/30">
            {{ $routes->links() }}
        </div>
    @endif
</div>
@endsectionth>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @foreach($routes as $route)
                <tr>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $route->name }}</td>
                    <td class="px-4 py-3">{{ $route->pickup_point }}</td>
                    <td class="px-4 py-3">{{ $route->dropoff_point }}</td>
                    <td class="px-4 py-3">{{ number_format($route->price) }} VND</td>
                    <td class="px-4 py-3">
                        <x-ui.badge :color="$route->status === 'active' ? 'green' : 'gray'">{{ ucfirst($route->status) }}</x-ui.badge>
                    </td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.routes.edit', $route) }}" class="text-primary hover:underline">Edit</a>
                        <form method="POST" action="{{ route('admin.routes.destroy', $route) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete this route?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-ui.table>

    <div class="mt-6">
        {{ $routes->links() }}
    </div>
</x-admin-layout>
