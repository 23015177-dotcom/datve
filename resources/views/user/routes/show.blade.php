# resources/views/user/routes/show.blade.php

```blade
<x-app-layout>

    <section class="relative overflow-hidden bg-slate-950">

        <div class="absolute inset-0 opacity-30">
            @if($route->image)
                <img
                    src="{{ asset('storage/' . $route->image) }}"
                    class="w-full h-full object-cover"
                    alt="{{ $route->name }}"
                >
            @endif
        </div>

        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/90 to-slate-900/70"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">

            <div class="max-w-3xl">

                <div class="inline-flex items-center gap-2 bg-blue-600/20 border border-blue-500/30 rounded-full px-4 py-2 text-blue-200 text-sm font-medium mb-6">
                    <span>Premium Airport Transfer</span>
                </div>

                <h1 class="text-5xl md:text-6xl font-black text-white leading-tight">
                    {{ $route->name }}
                </h1>

                <p class="mt-6 text-lg text-slate-300 leading-relaxed max-w-2xl">
                    Experience comfortable and reliable airport transportation with professional drivers and modern vehicles.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl px-5 py-4 min-w-[180px]">
                        <div class="text-slate-400 text-sm">
                            Pickup Point
                        </div>

                        <div class="text-white font-semibold mt-1">
                            {{ $route->pickup_point }}
                        </div>
                    </div>

                    <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl px-5 py-4 min-w-[180px]">
                        <div class="text-slate-400 text-sm">
                            Dropoff Point
                        </div>

                        <div class="text-white font-semibold mt-1">
                            {{ $route->dropoff_point }}
                        </div>
                    </div>

                    <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl px-5 py-4 min-w-[180px]">
                        <div class="text-slate-400 text-sm">
                            Duration
                        </div>

                        <div class="text-white font-semibold mt-1">
                            {{ $route->duration_minutes }} minutes
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <section class="bg-slate-50 py-16">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid lg:grid-cols-3 gap-10">


                <div class="lg:col-span-2 space-y-8">

                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">

                        <div class="flex items-center justify-between mb-8">

                            <div>
                                <h2 class="text-3xl font-bold text-slate-900">
                                    Route Information
                                </h2>

                                <p class="mt-2 text-slate-500">
                                    Full transfer route details.
                                </p>
                            </div>

                            <div class="hidden md:flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                                Available Today
                            </div>

                        </div>


                        <div class="space-y-8">

                            <div class="flex items-start gap-5">

                                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
                                    📍
                                </div>

                                <div>
                                    <div class="text-sm text-slate-400 font-medium">
                                        Pickup Location
                                    </div>

                                    <div class="text-xl font-bold text-slate-900 mt-1">
                                        {{ $route->pickup_point }}
                                    </div>
                                </div>

                            </div>


                            <div class="border-l-2 border-dashed border-slate-300 ml-7 h-10"></div>


                            <div class="flex items-start gap-5">

                                <div class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center text-2xl">
                                    🏁
                                </div>

                                <div>
                                    <div class="text-sm text-slate-400 font-medium">
                                        Dropoff Location
                                    </div>

                                    <div class="text-xl font-bold text-slate-900 mt-1">
                                        {{ $route->dropoff_point }}
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">

                        <h2 class="text-3xl font-bold text-slate-900">
                            Why Choose This Transfer?
                        </h2>

                        <div class="grid md:grid-cols-2 gap-6 mt-8">

                            <div class="rounded-2xl bg-slate-50 p-6 border border-slate-100">
                                <div class="text-3xl mb-4">🚘</div>
                                <h3 class="font-bold text-lg text-slate-900">
                                    Modern Vehicles
                                </h3>
                                <p class="mt-2 text-slate-500 leading-relaxed">
                                    Comfortable vehicles with professional maintenance and clean interiors.
                                </p>
                            </div>

                            <div class="rounded-2xl bg-slate-50 p-6 border border-slate-100">
                                <div class="text-3xl mb-4">👨‍✈️</div>
                                <h3 class="font-bold text-lg text-slate-900">
                                    Professional Drivers
                                </h3>
                                <p class="mt-2 text-slate-500 leading-relaxed">
                                    Experienced and friendly drivers ensuring safe transportation.
                                </p>
                            </div>

                            <div class="rounded-2xl bg-slate-50 p-6 border border-slate-100">
                                <div class="text-3xl mb-4">⏱️</div>
                                <h3 class="font-bold text-lg text-slate-900">
                                    On-Time Pickup
                                </h3>
                                <p class="mt-2 text-slate-500 leading-relaxed">
                                    Reliable scheduling with optimized travel timing.
                                </p>
                            </div>

                            <div class="rounded-2xl bg-slate-50 p-6 border border-slate-100">
                                <div class="text-3xl mb-4">🛡️</div>
                                <h3 class="font-bold text-lg text-slate-900">
                                    Safe Journey
                                </h3>
                                <p class="mt-2 text-slate-500 leading-relaxed">
                                    Prioritizing passenger safety and comfortable travel experiences.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>


                <div>

                    <div class="sticky top-24 bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">

                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-white">

                            <div class="text-sm uppercase tracking-wider text-blue-100 font-semibold">
                                Starting Price
                            </div>

                            <div class="mt-3 text-5xl font-black">
                                {{ number_format($route->price) }}
                            </div>

                            <div class="mt-1 text-blue-100">
                                VND / trip
                            </div>

                        </div>


                        <div class="p-8">

                            <div class="space-y-5">

                                <div class="flex items-center justify-between text-slate-600">
                                    <span>Transfer Type</span>
                                    <span class="font-semibold text-slate-900">
                                        Private
                                    </span>
                                </div>

                                <div class="flex items-center justify-between text-slate-600">
                                    <span>Travel Duration</span>
                                    <span class="font-semibold text-slate-900">
                                        {{ $route->duration_minutes }} mins
                                    </span>
                                </div>

                                <div class="flex items-center justify-between text-slate-600">
                                    <span>Status</span>
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                                        Available
                                    </span>
                                </div>

                            </div>


                            <div class="mt-8">

                                <a
                                    href="{{ route('bookings.create', $route) }}"
                                    class="w-full inline-flex items-center justify-center rounded-2xl bg-slate-900 hover:bg-blue-600 transition-all duration-300 text-white font-bold py-4 text-lg"
                                >
                                    Book This Transfer
                                </a>

                            </div>


                            <div class="mt-6 text-center text-sm text-slate-400 leading-relaxed">
                                Secure booking process with instant confirmation and reliable service.
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</x-app-layout>
