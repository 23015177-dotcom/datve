<x-user-layout>
    <div style="background-color: #f1f5f9; font-family: 'Be Vietnam Pro', sans-serif; min-height: 100vh; padding: 36px 20px 80px;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 14px; margin-bottom: 22px;">
                <div>
                    <h1 style="font-size: 30px; font-weight: 800; color: #111827; margin: 0;">Lịch sử đặt vé</h1>
                    <p style="margin: 6px 0 0; font-size: 14px; color: #6b7280;">Quản lý trạng thái các chuyến xe bạn đã đặt.</p>
                </div>
                <a href="{{ route('user.routes.index') }}" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none; background: #2563eb; color: #fff; padding: 11px 16px; border-radius: 12px; font-size: 14px; font-weight: 700;">
                    <span style="font-size: 16px; line-height: 1;">+</span>
                    Đặt chuyến xe mới
                </a>
            </div>

            @if(session('success'))
                <div style="margin-bottom: 16px; padding: 14px 16px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; border-radius: 12px; font-size: 14px; font-weight: 600;">
                    {{ session('success') }}
                </div>
            @endif

            <div style="background: #fff; border: 1px solid #e5e7eb; border-radius: 18px; overflow: hidden;">
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; min-width: 920px;">
                        <thead style="background: #f8fafc; border-bottom: 1px solid #e5e7eb;">
                            <tr>
                                <th style="text-align: left; font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em; padding: 14px 18px;">Tuyến đường</th>
                                <th style="text-align: left; font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em; padding: 14px 18px;">Thời gian đón</th>
                                <th style="text-align: center; font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em; padding: 14px 18px;">Hành khách</th>
                                <th style="text-align: right; font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em; padding: 14px 18px;">Tổng chi phí</th>
                                <th style="text-align: center; font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em; padding: 14px 18px;">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                                @php
                                    [$badgeBg, $dotBg, $textColor, $label] = match($booking->status) {
                                        'confirmed' => ['#ecfdf5', '#10b981', '#047857', 'Đã xác nhận'],
                                        'cancelled' => ['#fef2f2', '#f43f5e', '#be123c', 'Đã hủy'],
                                        default => ['#fffbeb', '#f59e0b', '#b45309', 'Chờ xử lý'],
                                    };
                                @endphp
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td style="padding: 16px 18px;">
                                        <div style="font-size: 15px; font-weight: 700; color: #111827;">{{ $booking->transferRoute->name }}</div>
                                        <div style="font-size: 12px; color: #6b7280; margin-top: 3px;">
                                            {{ $booking->transferRoute->pickup_point }} → {{ $booking->transferRoute->dropoff_point }}
                                        </div>
                                    </td>
                                    <td style="padding: 16px 18px; font-size: 14px; color: #374151; font-weight: 600;">
                                        {{ $booking->pickup_time->format('d/m/Y H:i') }}
                                    </td>
                                    <td style="padding: 16px 18px; text-align: center;">
                                        <span style="display: inline-block; background: #f1f5f9; color: #334155; padding: 5px 10px; border-radius: 10px; font-size: 12px; font-weight: 700;">
                                            {{ $booking->num_passengers }} người
                                        </span>
                                    </td>
                                    <td style="padding: 16px 18px; text-align: right; font-size: 14px; font-weight: 800; color: #2563eb;">
                                        {{ number_format($booking->total_price) }}đ
                                    </td>
                                    <td style="padding: 16px 18px; text-align: center;">
                                        <span style="display: inline-flex; align-items: center; gap: 6px; background: {{ $badgeBg }}; color: {{ $textColor }}; font-size: 12px; font-weight: 700; border-radius: 999px; padding: 6px 10px;">
                                            <span style="width: 7px; height: 7px; border-radius: 50%; background: {{ $dotBg }}; display: inline-block;"></span>
                                            {{ $label }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="padding: 50px 18px; text-align: center;">
                                        <div style="font-size: 14px; font-weight: 600; color: #6b7280;">Bạn chưa thực hiện lượt đặt vé nào.</div>
                                        <div style="font-size: 12px; color: #9ca3af; margin-top: 4px;">Các chuyến xe bạn đặt sẽ xuất hiện tại đây.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if ($bookings->hasPages())
                <div style="margin-top: 18px; display: flex; justify-content: space-between; align-items: center; gap: 12px;">
                    <div style="font-size: 13px; color: #6b7280;">
                        Trang {{ $bookings->currentPage() }} / {{ $bookings->lastPage() }}
                    </div>
                    <div style="display: flex; gap: 8px;">
                        @if ($bookings->onFirstPage())
                            <span style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 10px; color: #9ca3af; font-size: 13px; font-weight: 700;">← Trước</span>
                        @else
                            <a href="{{ $bookings->previousPageUrl() }}" style="text-decoration: none; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 10px; color: #1e293b; font-size: 13px; font-weight: 700; background: #fff;">← Trước</a>
                        @endif

                        @if ($bookings->hasMorePages())
                            <a href="{{ $bookings->nextPageUrl() }}" style="text-decoration: none; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 10px; color: #1e293b; font-size: 13px; font-weight: 700; background: #fff;">Sau →</a>
                        @else
                            <span style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 10px; color: #9ca3af; font-size: 13px; font-weight: 700;">Sau →</span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-user-layout>
