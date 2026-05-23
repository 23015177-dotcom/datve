<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Hệ thống Quản trị - Airport Transfer</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2=family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            navy: {
                                800: '#1e293b',
                                900: '#0f172a',
                                950: '#020617'
                            }
                        }
                    }
                }
            }
        </script>
        <style>
            body { font-family: 'Be Vietnam Pro', sans-serif !important; }
            .sidebar-fix { width: 260px !important; min-width: 260px !important; }
        </style>
    </head>
    <body class="bg-slate-100 text-slate-800 antialiased">
        <div class="min-h-screen flex">
            
            <div class="sidebar-fix bg-navy-950 text-slate-300 flex flex-col justify-between p-4 shrink-0 min-h-screen shadow-2xl border-r border-slate-800">
                <div>
                    <div class="text-white font-bold text-lg flex items-center gap-3 mb-8 px-2 border-b border-slate-800/60 pb-5">
                        <span class="h-9 w-9 rounded-xl bg-blue-600 text-white flex items-center justify-center font-extrabold text-base shadow-lg shadow-blue-500/30">AT</span>
                        <div class="flex flex-col">
                            <span class="text-sm font-bold tracking-wide text-white">Airport Transfer</span>
                            <span class="text-[10px] text-slate-500 font-medium tracking-tight">Hệ thống quản lý</span>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <span class="text-[10px] uppercase font-bold text-slate-500 block px-3 mb-2 tracking-widest">TỔNG QUAN</span>
                            <a href="/admin/dashboard" class="flex items-center px-3 py-2.5 rounded-xl text-slate-400 font-medium hover:text-white hover:bg-slate-800/50 text-sm no-underline transition flex">
                                📊 <span class="ml-2">Bảng điều khiển</span>
                            </a>
                        </div>

                        <div>
                            <span class="text-[10px] uppercase font-bold text-slate-500 block px-3 mb-2 tracking-widest">QUẢN LÝ DỊCH VỤ</span>
                            <div class="flex flex-col space-y-1">
                                <a href="/admin/routes" class="flex items-center px-3 py-2.5 rounded-xl text-slate-400 font-medium hover:text-white hover:bg-slate-800/50 text-sm no-underline transition flex">
                                    🗺️ <span class="ml-2">Tuyến đường</span>
                                </a>
                                <a href="/admin/vehicles" class="flex items-center px-3 py-2.5 rounded-xl text-slate-400 font-medium hover:text-white hover:bg-slate-800/50 text-sm no-underline transition flex">
                                    🚗 <span class="ml-2">Phương tiện</span>
                                </a>
                                <a href="/admin/drivers" class="flex items-center px-3 py-2.5 rounded-xl text-slate-400 font-medium hover:text-white hover:bg-slate-800/50 text-sm no-underline transition flex">
                                    👨‍✈️ <span class="ml-2">Tài xế</span>
                                </a>
                                <a href="/admin/bookings" class="flex items-center px-3 py-2.5 rounded-xl text-slate-400 font-medium hover:text-white hover:bg-slate-800/50 text-sm no-underline transition flex">
                                    📅 <span class="ml-2">Danh sách đặt chỗ</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-[11px] text-slate-600 border-t border-slate-900 pt-4 px-2 font-medium">
                    © 2026 Airport Transfer
                </div>
            </div>

            <div class="flex-1 flex flex-col min-w-0">
                
                <header class="bg-white border-b border-slate-200 h-16 flex items-center justify-between px-8 shadow-sm sticky top-0 z-10">
                    <div>
                        <nav class="text-[11px] text-slate-400 font-medium mb-0.5">Admin Panel / Hệ thống quản trị</nav>
                        <h2 class="text-sm font-bold text-slate-800 m-0">Không gian điều hành</h2>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 bg-slate-50 px-3 py-1.5 rounded-xl border border-slate-200">
                            <span class="text-sm">👑</span>
                            <span class="text-xs font-bold text-slate-700">{{ auth()->user()->name ?? 'Admin' }}</span>
                        </div>
                        
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold px-4 py-2 rounded-xl border border-red-200/60 transition cursor-pointer">
                                Đăng xuất ↩
                            </button>
                        </form>
                    </div>
                </header>

                <main class="p-8 flex-1 overflow-y-auto bg-slate-50">
                    {{ $slot ?? '' }}
                    @yield('content')
                </main>

            </div>
        </div>
    </body>
</html>