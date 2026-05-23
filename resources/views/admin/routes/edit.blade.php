<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden w-full">
        <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
            <div>
                <h3 class="text-base font-bold text-slate-800 mb-1">Cập nhật thông tin tuyến đường</h3>
                <p class="text-xs text-slate-500 m-0">Chỉnh sửa thông tin lộ trình mã số #{{ $route->id }}</p>
            </div>
            <a href="{{ route('admin.routes.index') }}" class="text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-xl no-underline transition">
                ← Quay lại danh sách
            </a>
        </div>

        <form action="{{ route('admin.routes.update', $route) }}" method="POST" enctype="multipart/form-data" class="p-6 m-0 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tên tuyến đường <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $route->name) }}" required 
                    class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Điểm đón (Pickup Point) <span class="text-red-500">*</span></label>
                    <input type="text" name="pickup_point" value="{{ old('pickup_point', $route->pickup_point) }}" required 
                        class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Điểm trả (Dropoff Point) <span class="text-red-500">*</span></label>
                    <input type="text" name="dropoff_point" value="{{ old('dropoff_point', $route->dropoff_point) }}" required 
                        class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Gán phương tiện (Vehicle) <span class="text-red-500">*</span></label>
                    <select name="vehicle_id" required class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition bg-white cursor-pointer">
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" {{ $route->vehicle_id == $vehicle->id ? 'selected' : '' }}>
                                {{ $vehicle->name ?? $vehicle->model }} ({{ $vehicle->license_plate }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Gán tài xế lái xe (Driver) <span class="text-red-500">*</span></label>
                    <select name="driver_id" required class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition bg-white cursor-pointer">
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->id }}" {{ $route->driver_id == $driver->id ? 'selected' : '' }}>
                                {{ $driver->name }} ({{ $driver->phone }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Giá vé hành trình (VND) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" value="{{ old('price', $route->price) }}" required 
                        class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Cập nhật hình ảnh tuyến</label>
                    <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer border border-slate-200 p-1.5 rounded-xl bg-white">
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-md shadow-blue-500/20 transition cursor-pointer">
                    💾 Cập nhật tuyến đường
                </button>
            </div>
        </form>
    </div>
</x-app-layout>