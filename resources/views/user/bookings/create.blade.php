<x-app-layout>
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Xác Nhận Đặt Vé</h1>
            <p class="mt-2 text-sm text-gray-600">Vui lòng kiểm tra lại thông tin hành trình và điền thông tin hành khách.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            <div class="lg:col-span-1 bg-gradient-to-br from-slate-900 to-indigo-950 text-white rounded-2xl shadow-xl overflow-hidden relative">
                <div class="absolute left-0 right-0 top-1/2 -translate-y-1/2 flex justify-between px-1 opacity-20 pointer-events-none">
                    <div class="w-4 h-8 bg-gray-100 rounded-r-full -ml-2"></div>
                    <div class="w-4 h-8 bg-gray-100 rounded-l-full -mr-2"></div>
                </div>
                
                <div class="p-6 border-b border-dashed border-white/20 pb-8">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-500/30 text-indigo-200 mb-4">
                        Thông tin chuyến xe
                    </span>
                    <h3 class="text-xl font-bold tracking-wide text-indigo-300">{{ $route->name }}</h3>
                    
                    <div class="mt-6 space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="mt-1 w-2 h-2 rounded-full bg-emerald-400 ring-4 ring-emerald-400/20"></div>
                            <div>
                                <p class="text-xs text-slate-400 uppercase tracking-wider">Điểm đón</p>
                                <p class="text-sm font-medium mt-0.5 text-slate-100">{{ $route->pickup_point }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="mt-1 w-2 h-2 rounded-full bg-amber-400 ring-4 ring-amber-400/20"></div>
                            <div>
                                <p class="text-xs text-slate-400 uppercase tracking-wider">Điểm trả</p>
                                <p class="text-sm font-medium mt-0.5 text-slate-100">{{ $route->dropoff_point }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-white/5 pt-8">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-slate-400">Giá vé đơn:</span>
                        <span class="text-lg font-bold text-amber-400">{{ number_format($route->price) }}đ <span class="text-xs text-slate-400 font-normal">/ khách</span></span>
                    </div>
                    
                    <div class="bg-indigo-600/20 border border-indigo-500/30 rounded-xl p-4 text-center">
                        <span class="text-xs uppercase tracking-wider text-indigo-300 font-semibold block mb-1">Tổng chi phí dự tính</span>
                        <span id="total_price" class="text-2xl font-black text-white tracking-tight">0 VND</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
                <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Thông tin người đặt vé
                </h3>

                <form method="POST" action="{{ route('bookings.store') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="transfer_route_id" value="{{ $route->id }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <x-ui.input name="passenger_name" label="Họ và tên hành khách" class="w-full rounded-xl" placeholder="Ví dụ: Nguyễn Văn A" />
                        </div>
                        <div>
                            <x-ui.input name="passenger_phone" label="Số điện thoại liên hệ" class="w-full rounded-xl" placeholder="Ví dụ: 0912345xxx" />
                        </div>
                        <div>
                            <x-ui.input name="pickup_time" type="datetime-local" label="Thời gian đón mong muốn" class="w-full rounded-xl" />
                        </div>
                        <div>
                            <x-ui.input name="num_passengers" type="number" label="Số lượng hành khách đi cùng" id="num_passengers" min="1" value="1" class="w-full rounded-xl" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            <span class="mb-2 inline-block">Ghi chú đặc biệt cho tài xế (nếu có)</span>
                            <textarea name="note" rows="4" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-150" placeholder="Nhập yêu cầu đặc biệt về hành lý, điểm đón cụ thể..."></textarea>
                        </label>
                        @error('note')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                        <a href="javascript:history.back()" class="px-5 py-2.5 rounded-xl border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-50 transition">
                            Quay lại
                        </a>
                        <x-ui.button type="submit" class="px-6 py-2.5 rounded-xl font-semibold shadow-md bg-indigo-600 hover:bg-indigo-700 text-white transition">
                            Xác Nhận Đặt Vé Ngay
                        </x-ui.button>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <script>
        const pricePerSeat = {{ (int) $route->price }};
        const seatsInput = document.getElementById('num_passengers');
        const totalEl = document.getElementById('total_price');

        const formatMoney = (value) => new Intl.NumberFormat('vi-VN').format(value) + ' VND';
        const updateTotal = () => {
            const seats = Number(seatsInput.value || 0);
            totalEl.textContent = formatMoney(seats * pricePerSeat);
        };

        seatsInput.addEventListener('input', updateTotal);
        seatsInput.addEventListener('change', updateTotal);
        updateTotal();
    </script>
</x-app-layout>