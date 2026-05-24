<x-user-layout>
    <div style="background-color: #f1f5f9; font-family: 'Be Vietnam Pro', sans-serif; padding-bottom: 80px; min-height: 100vh; text-align: left;">

        <div style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); padding: 60px 20px; color: #ffffff; text-align: left;">
            <div style="max-width: 1000px; margin: 0 auto;">
                <div style="display: inline-block; background-color: rgba(234, 88, 12, 0.2); border: 1px solid rgba(234, 88, 12, 0.4); border-radius: 50px; padding: 4px 14px; font-size: 12px; font-weight: 600; color: #f97316; text-transform: uppercase; margin-bottom: 16px;">
                    ✍️ Tiến hành đặt chuyến
                </div>
                <h1 style="font-size: 32px; font-weight: 800; margin: 0 0 8px 0; letter-spacing: -0.5px;">
                    Xác Nhận Đặt Vé
                </h1>
                <p style="font-size: 14px; color: #cbd5e1; margin: 0; max-width: 600px; font-weight: 300;">
                    Vui lòng kiểm tra lại thông tin hành trình bên dưới và điền thông tin hành khách để hoàn tất thủ tục đặt xe.
                </p>
            </div>
        </div>

        <div style="max-width: 1000px; margin: 30px auto 0 auto; padding: 0 20px; display: flex; flex-direction: column; gap: 24px;">
            
            <div style="background-color: #ffffff; border-radius: 20px; padding: 24px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
                <h3 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 16px 0; display: flex; align-items: center; gap: 8px;">
                    🚏 Thông tin tuyến xe đã chọn
                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
                    <div>
                        <span style="font-size: 12px; color: #64748b; font-weight: 600; text-transform: uppercase;">Tên tuyến</span>
                        <div style="font-size: 16px; font-weight: 700; color: #1e293b; margin-top: 4px;">{{ $route->name }}</div>
                    </div>
                    <div>
                        <span style="font-size: 12px; color: #64748b; font-weight: 600; text-transform: uppercase;">Lộ trình</span>
                        <div style="font-size: 15px; font-weight: 600; color: #334155; margin-top: 4px;">📍 {{ $route->pickup_point }} ➡️ 🏁 {{ $route->dropoff_point }}</div>
                    </div>
                    <div>
                        <span style="font-size: 12px; color: #64748b; font-weight: 600; text-transform: uppercase;">Giá vé trọn gói</span>
                        <div style="font-size: 18px; font-weight: 900; color: #1d4ed8; margin-top: 2px;">{{ number_format($route->price) }} VND</div>
                    </div>
                </div>
            </div>

            <div style="background-color: #ffffff; border-radius: 20px; padding: 32px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
                <h3 style="font-size: 18px; font-weight: 800; color: #0f172a; margin: 0 0 24px 0; display: flex; align-items: center; gap: 8px;">
                    👤 Thông tin người đặt vé
                </h3>

                @if ($errors->any())
                    <div style="margin-bottom: 16px; background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; border-radius: 12px; padding: 12px 14px; font-size: 14px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('user.bookings.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
                    @csrf
                    <input type="hidden" name="transfer_route_id" value="{{ $route->id }}">

                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; color: #475569; margin-bottom: 8px;">
                            Họ và tên hành khách <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="text" name="passenger_name" value="{{ old('passenger_name') }}" required placeholder="Ví dụ: Nguyễn Văn A" 
                            style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 14px; color: #1e293b; box-sizing: border-box;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; color: #475569; margin-bottom: 8px;">
                            Số điện thoại liên hệ <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="tel" name="passenger_phone" value="{{ old('passenger_phone') }}" required placeholder="Ví dụ: 0912345xxx" 
                            style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 14px; color: #1e293b; box-sizing: border-box;">
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">
                        <div>
                            <label style="display: block; font-size: 13px; font-weight: 700; color: #475569; margin-bottom: 8px;">
                                Thời gian đón mong muốn <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="datetime-local" name="pickup_time" value="{{ old('pickup_time') }}" required 
                                style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 14px; color: #1e293b; box-sizing: border-box;">
                        </div>

                        <div>
                            <label style="display: block; font-size: 13px; font-weight: 700; color: #475569; margin-bottom: 8px;">
                                Số lượng hành khách đi cùng
                            </label>
                            <input type="number" name="num_passengers" min="1" value="{{ old('num_passengers', 1) }}" 
                                style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 14px; color: #1e293b; box-sizing: border-box;">
                        </div>
                    </div>

                    <div style="margin-top: 10px;">
                        <button type="submit" style="width: 100%; background-color: #ea580c; color: #ffffff; padding: 16px; border: none; border-radius: 12px; font-size: 16px; font-weight: 700; cursor: pointer; transition: background-color 0.2s; box-shadow: 0 4px 12px rgba(234, 88, 12, 0.2);">
                            Xác Nhận Đặt Chuyến Ngay 🚀
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-user-layout>
