<x-app-layout>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Lịch Sử Đặt Vé</h1>
                <p class="mt-1 text-sm text-gray-500">Quản lý và theo dõi trạng thái các chuyến xe bạn đã đặt.</p>
            </div>
            <div>
                <a href="{{ route('routes.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-xl shadow-md shadow-indigo-600/10 transition duration-150">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Đặt chuyến xe mới
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center gap-3 shadow-sm">
                <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 border-b border-gray-100 text-xs uppercase tracking-wider text-slate-500 font-bold">
                        <tr>
                            <th class="px-6 py-4">Tuyến đường / Chuyến xe</th>
                            <th class="px-6 py-4">Thời gian đón</th>
                            <th class="px-6 py-4 text-center">Số hành khách</th>
                            <th class="px-6 py-4 text-right">Tổng chi phí</th>
                            <th class="px-6 py-4 text-center">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-slate-50/80 transition duration-150 group">
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900 group-hover:text-indigo-600 transition duration-150">
                                        {{ $booking->transferRoute->name }}
                                    </div>
                                    <div class="text-xs text-gray-400 mt-0.5">
                                        {{ $booking->transferRoute->pickup_point }} → {{ $booking->transferRoute->dropoff_point }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-700 flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $booking->pickup_time->format('d/m/Y H:i') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-semibold">
                                        {{ $booking->num_passengers }} người
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="text-sm font-bold text-indigo-600">
                                        {{ number_format($booking->total_price) }}đ
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @php
                                        // Tự động dịch và chọn màu chuẩn UI xịn
                                        [$bgStyle, $textStyle, $label] = match($booking->status) {
                                            'confirmed' => ['bg-emerald-50 ring-emerald-600/10 text-emerald-700', 'bg-emerald-500', 'Đã xác nhận'],
                                            'cancelled' => ['bg-rose-50 ring-rose-600/10 text-rose-700', 'bg-rose-500', 'Đã hủy'],
                                            default => ['bg-amber-50 ring-amber-600/10 text-amber-700', 'bg-amber-500', 'Chờ xử lý'],
                                        };
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold ring-1 ring-inset {{ $bgStyle }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $textStyle }}"></span>
                                        {{ $label }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="p-3 rounded-full bg-slate-50 text-slate-400 mb-3">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                        </div>
                                        <p class="text-sm font-medium text-gray-500">Bạn chưa thực hiện lượt đặt vé nào.</p>
                                        <p class="text-xs text-gray-400 mt-1">Các chuyến xe bạn đặt sẽ xuất hiện tại đây.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">
            {{ $bookings->links() }}
        </div>
    </section>
</x-app-layout>