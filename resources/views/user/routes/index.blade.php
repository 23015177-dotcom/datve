<x-user-layout>
    <div style="background-color: #f1f5f9; font-family: 'Be Vietnam Pro', sans-serif; padding-bottom: 80px; min-height: 100vh; text-align: left;">
        
        <div style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); padding: 60px 20px; color: #ffffff; text-align: left;">
            <div style="max-width: 1200px; margin: 0 auto;">
                
                <h1 style="font-size: 36px; font-weight: 800; margin: 0 0 8px 0; letter-spacing: -0.5px;">
                    Đặt xe đưa đón sân bay
                </h1>
                <p style="font-size: 15px; color: #94a3b8; margin: 0 0 30px 0;">
                    Lựa chọn tuyến đường phù hợp và đặt xe nhanh chóng chỉ trong vài phút.
                </p>

                <form action="{{ route('user.routes.index') }}" method="GET" style="background-color: #ffffff; padding: 24px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); display: flex; flex-direction: column; gap: 16px;">
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
                        <div>
                            <label style="display: block; font-size: 13px; font-weight: 700; color: #475569; margin-bottom: 6px; text-transform: uppercase;">
                                Điểm đón
                            </label>
                            <input type="text" name="pickup_point" value="{{ $searchPickup }}" placeholder="Ví dụ: Sân bay Tân Sơn Nhất" 
                                style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 14px; color: #1e293b; box-sizing: border-box;">
                        </div>

                        <div>
                            <label style="display: block; font-size: 13px; font-weight: 700; color: #475569; margin-bottom: 6px; text-transform: uppercase;">
                                Điểm trả
                            </label>
                            <input type="text" name="dropoff_point" value="{{ $searchDropoff }}" placeholder="Ví dụ: Quận 1" 
                                style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 14px; color: #1e293b; box-sizing: border-box;">
                        </div>
                    </div>

                    <button type="submit" style="width: 100%; background-color: #ea580c; color: #ffffff; padding: 14px; border: none; border-radius: 10px; font-size: 16px; font-weight: 700; cursor: pointer; transition: background-color 0.2s;">
                        Tìm kiếm chuyến xe 🔍
                    </button>

                </form>

            </div>
        </div>

        <div style="max-width: 1200px; margin: 40px auto 0 auto; padding: 0 20px;">
            
            <h2 style="font-size: 22px; font-weight: 800; color: #0f172a; margin-bottom: 24px;">
                @if($searchPickup || $searchDropoff) Kết quả tìm kiếm chuyến xe @else Tuyến đường phổ biến đang sẵn sàng @endif
            </h2>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 24px;">
                @forelse($routes as $route)
                    <div style="background-color: #ffffff; border-radius: 20px; padding: 24px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; display: flex; flex-direction: column; justify-content: space-between; min-height: 200px;">
                        <div>
                            <div style="font-size: 20px; font-weight: 800; color: #0f172a; margin-bottom: 8px;">
                                {{ $route->name }}
                            </div>
                            <div style="font-size: 14px; color: #64748b; margin-bottom: 6px;">
                                📍 Từ: <span style="font-weight: 600; color: #334155;">{{ $route->pickup_point }}</span>
                            </div>
                            <div style="font-size: 14px; color: #64748b; margin-bottom: 12px;">
                                🏁 Đến: <span style="font-weight: 600; color: #334155;">{{ $route->dropoff_point }}</span>
                            </div>
                            <div style="font-size: 13px; color: #94a3b8; margin-bottom: 16px;">
                                ⏱️ Thời gian di chuyển: {{ $route->duration_minutes }} phút
                            </div>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 16px; margin-top: auto;">
                            <div style="font-size: 20px; font-weight: 900; color: #1d4ed8;">
                                {{ number_format($route->price) }} <span style="font-size: 13px; font-weight: 600; color: #64748b;">VNĐ</span>
                            </div>
                            <a href="{{ route('user.routes.show', $route) }}" style="background-color: #1e293b; color: #ffffff; padding: 10px 18px; border-radius: 10px; font-size: 14px; font-weight: 700; text-decoration: none; transition: background-color 0.2s;">
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; background-color: #ffffff; text-align: center; padding: 40px; border-radius: 16px; color: #64748b; font-weight: 500;">
                        Thông cảm nha! Hiện tại chưa có tuyến xe phù hợp với yêu cầu tìm kiếm của bạn rồi 😢
                    </div>
                @endforelse
            </div>

            <div style="margin-top: 32px;">
                {{ $routes->links() }}
            </div>

        </div>
    </div>
</x-user-layout>