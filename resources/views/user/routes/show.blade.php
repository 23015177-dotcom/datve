<x-app-layout>
    <div style="background-color: #f1f5f9; font-family: 'Be Vietnam Pro', sans-serif; padding-bottom: 80px;">

        <div style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); padding: 80px 20px; color: #ffffff; position: relative; overflow: hidden; text-align: left;">
            <div style="max-w: 1200px; margin: 0 auto;">
                
                <div style="display: inline-block; background-color: rgba(59, 130, 246, 0.2); border: 1px solid rgba(59, 130, 246, 0.4); border-radius: 50px; padding: 6px 16px; font-size: 13px; font-weight: 600; color: #93c5fd; text-transform: uppercase; margin-bottom: 24px;">
                    ✨ Dịch Vụ Đưa Đón Sân Bay Cao Cấp
                </div>

                <h1 style="font-size: 42px; font-weight: 900; margin: 0 0 16px 0; line-height: 1.2; letter-spacing: -1px;">
                    {{ $route->name }}
                </h1>

                <p style="font-size: 16px; color: #cbd5e1; margin: 0 0 32px 0; max-width: 600px; line-height: 1.6; font-weight: 300;">
                    Trải nghiệm hành trình di chuyển ra sân bay trọn vẹn, an tâm tuyệt đối với dàn xe đời mới tinh tươm và đội ngũ bác tài tận tâm, chuyên nghiệp.
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    
                    <div style="background-color: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); padding: 20px; border-radius: 16px;">
                        <div style="font-size: 11px; color: #94a3b8; font-weight: 700; text-transform: uppercase;">Điểm Đón</div>
                        <div style="font-size: 18px; font-weight: 700; margin-top: 6px; color: #ffffff;">📍 {{ $route->pickup_point }}</div>
                    </div>

                    <div style="background-color: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); padding: 20px; border-radius: 16px;">
                        <div style="font-size: 11px; color: #94a3b8; font-weight: 700; text-transform: uppercase;">Điểm Trả</div>
                        <div style="font-size: 18px; font-weight: 700; margin-top: 6px; color: #ffffff;">🏁 {{ $route->dropoff_point }}</div>
                    </div>

                    <div style="background-color: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); padding: 20px; border-radius: 16px;">
                        <div style="font-size: 11px; color: #94a3b8; font-weight: 700; text-transform: uppercase;">Thời Gian Chạy</div>
                        <div style="font-size: 18px; font-weight: 700; margin-top: 6px; color: #ffffff;">⏱️ {{ $route->duration_minutes }} phút</div>
                    </div>

                </div>
            </div>
        </div>

        <div style="max-width: 1200px; margin: 40px auto 0 auto; padding: 0 20px; display: flex; flex-wrap: wrap; gap: 30px;">
            
            <div style="flex: 2; min-width: 320px;">
                
                <div style="background-color: #ffffff; border-radius: 24px; padding: 32px; margin-bottom: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                    <h2 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 8px 0;">Thông Tin Lộ Trình</h2>
                    <p style="font-size: 14px; color: #64748b; margin: 0 0 30px 0;">Chi tiết sơ đồ các điểm dừng đón trả khách</p>
                    
                    <div style="border-left: 2px dashed #cbd5e1; padding-left: 24px; margin-left: 10px;">
                        <div style="position: relative; margin-bottom: 32px;">
                            <div style="position: absolute; left: -31px; top: 4px; width: 12px; h-height: 12px; background-color: #3b82f6; border-radius: 50%; border: 4px solid #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.2);"></div>
                            <span style="font-size: 12px; font-weight: 700; color: #3b82f6; text-transform: uppercase;">Vị trí đón khách</span>
                            <div style="font-size: 18px; font-weight: 700; color: #1e293b; margin-top: 4px;">{{ $route->pickup_point }}</div>
                        </div>

                        <div style="position: relative;">
                            <div style="position: absolute; left: -31px; top: 4px; width: 12px; h-height: 12px; background-color: #4f46e5; border-radius: 50%; border: 4px solid #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.2);"></div>
                            <span style="font-size: 12px; font-weight: 700; color: #4f46e5; text-transform: uppercase;">Vị trí trả khách</span>
                            <div style="font-size: 18px; font-weight: 700; color: #1e293b; margin-top: 4px;">{{ $route->dropoff_point }}</div>
                        </div>
                    </div>
                </div>

                <div style="background-color: #ffffff; border-radius: 24px; padding: 32px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                    <h2 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 24px 0;">Đặc Quyền Tiện Ích Kèm Theo</h2>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">
                        <div style="background-color: #f8fafc; padding: 20px; border-radius: 16px; border: 1px solid #e2e8f0;">
                            <span style="font-size: 28px;">🚘</span>
                            <h4 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 12px 0 6px 0;">Xe Đời Mới</h4>
                            <p style="font-size: 13px; color: #64748b; margin: 0; line-height: 1.5;">Xe 4-7 chỗ sạch sẽ, mát mẻ, không mùi khó chịu.</p>
                        </div>
                        <div style="background-color: #f8fafc; padding: 20px; border-radius: 16px; border: 1px solid #e2e8f0;">
                            <span style="font-size: 28px;">👨‍✈️</span>
                            <h4 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 12px 0 6px 0;">Tài Xế Lịch Sự</h4>
                            <p style="font-size: 13px; color: #64748b; margin: 0; line-height: 1.5;">Ăn mặc chỉnh tề, điềm đạm, hỗ trợ hành lý chu đáo.</p>
                        </div>
                    </div>
                </div>

            </div>

            <div style="flex: 1; min-width: 300px;">
                <div style="background-color: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 30px rgba(59, 130, 246, 0.1); border: 1px solid #e2e8f0;">
                    
                    <div style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); padding: 30px; color: #ffffff;">
                        <div style="font-size: 12px; text-transform: uppercase; letter-spacing: 1px; opacity: 0.8;">Chi Phí Trọn Gói Từ</div>
                        <div style="margin-top: 8px; display: flex; align-items: baseline;">
                            <span style="font-size: 38px; font-weight: 900; letter-spacing: -1px;">{{ number_format($route->price) }}</span>
                            <span style="font-size: 16px; font-weight: 500; margin-left: 6px; opacity: 0.9;">VNĐ</span>
                        </div>
                        <div style="font-size: 11px; margin-top: 6px; font-style: italic; opacity: 0.7;">* Đã bao gồm phí cầu đường, cao tốc</div>
                    </div>

                    <div style="padding: 30px;">
                        <div style="margin-bottom: 24px;">
                            <div style="display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 12px;">
                                <span style="color: #64748b;">Loại hình</span>
                                <span style="font-weight: 700; color: #1e293b;">Xe Riêng Biệt</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; font-size: 14px;">
                                <span style="color: #64748b;">Tình trạng</span>
                                <span style="font-weight: 700; color: #10b981;">● Sẵn Sàng Xe</span>
                            </div>
                        </div>

                        <a href="{{ route('bookings.create', $route) }}" style="display: block; background-color: #0f172a; color: #ffffff; text-align: center; padding: 16px; border-radius: 16px; font-size: 16px; font-weight: 700; text-decoration: none; transition: background-color 0.2s; box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);">
                            Đặt Chuyến Xe Này 😉
                        </a>

                        <div style="font-size: 11px; color: #94a3b8; text-align: center; margin-top: 16px; line-height: 1.4;">
                            🔒 Cam kết không phát sinh chi phí ẩn ngoài hóa đơn.
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>