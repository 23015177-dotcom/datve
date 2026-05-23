<x-app-layout>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden w-full">
        <div class="p-6 border-b border-slate-100 bg-slate-50/50">
            <h3 class="text-base font-bold text-slate-800 mb-1">Danh sách đặt vé của khách hàng</h3>
            <p class="text-xs text-slate-500 m-0">Duyệt vé, hủy vé và theo dõi trạng thái thanh toán đặt chỗ của hành khách</p>
        </div>

        <div class="overflow-x-auto w-full">
            <table class="w-full text-left border-collapse m-0">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Khách hàng</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Tuyến đường</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Ngày đi</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Trạng thái</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($bookings as $booking)
                        <tr class="hover:bg-slate-50/80 transition duration-150">
                            <td class="p-4">
                                <div class="font-semibold text-slate-800">{{ $booking->user->name ?? 'Khách vãng lai' }}</div>
                                <div class="text-[11px] text-slate-400 font-mono">{{ $booking->user->email ?? '' }}</div>
                            </td>
                            <td class="p-4 text-slate-600 font-medium">
                                🗺️ {{ $booking->route->name ?? 'Tuyến đường ẩn' }}
                            </td>
                            <td class="p-4 text-slate-600 text-xs font-mono">
                                📅 {{ $booking->travel_date }}
                            </td>
                            <td class="p-4">
                                @if($booking->status === 'confirmed')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                                        🟢 Đã xác nhận
                                    </span>
                                @elseif($booking->status === 'pending')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200/60">
                                        🟡 Chờ duyệt
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-200/60">
                                        🔴 Đã hủy
                                    </span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    @if($booking->status === 'pending')
                                        <form action="{{ route('admin.bookings.confirm', $booking) }}" method="POST" class="m-0">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="text-[11px] font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-2.5 py-1.5 rounded-lg border-0 transition cursor-pointer shadow-sm">
                                                Duyệt ✓
                                            </button>
                                        </form>
                                    @endif
                                    @if($booking->status !== 'cancelled')
                                        <form action="{{ route('admin.bookings.cancel', $booking) }}" method="POST" class="m-0" onsubmit="return confirm('Bạn có chắc chắn muốn hủy lượt đặt vé này?')">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="text-[11px] font-bold text-red-600 bg-red-50 hover:bg-red-100 border border-red-200 px-2.5 py-1.5 rounded-lg transition cursor-pointer">
                                                Hủy ✕
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-slate-400 font-medium">
                                📭 Chưa có lượt đặt vé nào từ khách hàng.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>