<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#4f46e5',
                            surface: '#f8fafc',
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="font-sans text-gray-800 antialiased bg-slate-50">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8">
            
            <a href="#" class="mb-6 flex items-center gap-2 text-indigo-600 font-bold text-2xl no-underline">
                <span class="h-10 w-10 rounded-lg bg-indigo-600 text-white flex items-center justify-center font-extrabold text-lg">AT</span>
                Airport Transfer
            </a>

            <div class="w-full sm:max-w-md px-8 py-8 bg-white shadow-xl rounded-2xl border border-gray-100">
                {{ $slot }}
            </div>
            
        </div>
    </body>
</html>