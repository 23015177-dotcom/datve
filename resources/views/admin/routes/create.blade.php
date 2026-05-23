<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden w-full">
        <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
            <div>
                <h3 class="text-base font-bold text-slate-800 mb-1">Thêm tuyến đường mới</h3>
                <p class="text-xs text-slate-500 m-0">Thiết lập lộ trình di chuyển, gán phương tiện và tài xế vận hành</p>
            </div>
            <a href="{{ route('admin.routes.index') }}" class="text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-xl no-underline transition">
                ← Quay lại danh sách
            </a>
        </div>

        <form action="{{ route('admin.routes.store') }}" method="POST" enctype="multipart/form-data" class="p-6 m-0 space-y-5">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tên tuyến đường <span class="text-red-500">*</span></label>
                <input type="text" name="name" required placeholder="Ví dụ: Sân Bay Tân Sơn Nhất - Quận 1" 
                    class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Điểm đón (Pickup Point) <span class="text-red-500">*</span></label>
                    <input type="text" name="pickup_point" required placeholder="Ví dụ: Tan Son Nhat Airport" 
                        class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Điểm trả (Dropoff Point) <span class="text-red-500">*</span></label>
                    <input type="text" name="dropoff_point" required placeholder="Ví dụ: District 1" 
                        class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Gán phương tiện (Vehicle) <span class="text-red-500">*</span></label>
                    <select name="vehicle_id" required class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition bg-white cursor-pointer">
                        <option value="">-- Chọn xe chạy tuyến này --</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->name ?? $vehicle->model }} ({{ $vehicle->license_plate }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Gán tài xế lái xe (Driver) <span class="text-red-500">*</span></label>
                    <select name="driver_id" required class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition bg-white cursor-pointer">
                        <option value="">-- Chọn tài xế phụ trách --</option>
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->name }} ({{ $driver->phone }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Giá vé hành trình (VND) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" required placeholder="Ví dụ: 250000" 
                        class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Hình ảnh bản đồ / Tuyến đường</label>
                    <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer border border-slate-200 p-1.5 rounded-xl bg-white">
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-md shadow-blue-500/20 transition cursor-pointer">
                    💾 Lưu tuyến đường
                </button>
            </div>
        </form>
    </div>
</x-app-layout>