<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Airport Transfer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; font-family: 'Be Vietnam Pro', sans-serif; background: #f1f5f9; color: #0f172a; }
        .user-nav a { text-decoration: none; font-weight: 700; font-size: 14px; border-radius: 10px; padding: 10px 14px; }
    </style>
</head>
<body>
    <header style="position: sticky; top: 0; z-index: 20; background: #ffffff; border-bottom: 1px solid #e2e8f0;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 12px 20px; display: flex; align-items: center; justify-content: space-between; gap: 12px;">
            <a href="{{ route('user.home') }}" style="text-decoration: none; color: #0f172a; font-size: 18px; font-weight: 900;">Airport Transfer</a>
            <nav class="user-nav" style="display: flex; align-items: center; gap: 10px;">
                <a href="{{ route('user.routes.index') }}" style="color: #334155; background: #f8fafc;">Tuyến xe</a>
                @auth                   
                    <a href="{{ route('user.bookings.index') }}" style="color: #334155; background: #f8fafc;">Đơn đặt vé</a>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" style="cursor: pointer; border: 1px solid #fecaca; color: #b91c1c; background: #fef2f2; font-weight: 700; font-size: 14px; border-radius: 10px; padding: 10px 14px;">Đăng xuất</button>
                    </form>
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" style="color: #ffffff; background: #0f172a;">Quản trị</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" style="color: #1e293b; background: #e2e8f0;">Đăng nhập</a>
                    <a href="{{ route('register') }}" style="color: #ffffff; background: #ea580c;">Đăng ký</a>
                @endauth
            </nav>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>
</body>
</html>
