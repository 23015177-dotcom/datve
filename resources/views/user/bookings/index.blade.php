<x-app-layout>
    <section class="relative overflow-hidden bg-gradient-to-r from-slate-900 via-blue-900 to-slate-900">
        <div class="absolute inset-0 opacity-20">
            <img
                src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=2070&auto=format&fit=crop"
                class="w-full h-full object-cover"
            >
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="max-w-3xl">
                <h1 class="text-5xl md:text-6xl font-bold text-white leading-tight">
                    Premium Airport Transfer Experience
                </h1>

                <p class="mt-6 text-lg text-slate-200 leading-relaxed">
                    Book reliable airport transportation with comfort,
                    professional drivers, and modern vehicles.
                </p>
            </div>

            <div class="mt-10 bg-white rounded-3xl shadow-2xl p-6 md:p-8">
                <form
                    method="GET"
                    action="{{ route('routes.index') }}"
                    class="grid gap-6 md:grid-cols-4"
                >

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Pickup Point
                        </label>

                        <input
                            type="text"
                            name="pickup_point"
                            value="{{ $searchPickup }}"
                            placeholder="Example: Tan Son Nhat Airport"
                            class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Dropoff Point
                        </label>

                        <input
                            type="text"
                            name="dropoff_point"
                            value="{{ $searchDropoff }}"
                            placeholder="Example: District 1"
                            class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Travel Date
                        </label>

                        <input
                            type="date"
                            class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    <div class="flex items-end">
                        <button
                            type="submit"
class="w-full rounded-2xl bg-blue-600 hover:bg-blue-700 transition-all duration-300 text-white font-semibold py-3"
                        >
                            Search Routes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-8 rounded-2xl bg-green-100 border border-green-200 text-green-700 px-5 py-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex items-center justify-between mb-10">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900">
                        Available Routes
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Choose your preferred route and book instantly.
                    </p>
                </div>

                <div class="hidden md:flex items-center gap-3">
                    <div class="px-4 py-2 bg-white rounded-xl shadow-sm text-sm text-slate-600">
                        {{ $routes->total() }} routes found
                    </div>
                </div>
            </div>

            <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2">

                @forelse($routes as $route)

                    <article class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100">

                        <div class="relative overflow-hidden">

                            @if($route->image)
                                <img
                                    src="{{ asset('storage/' . $route->image) }}"
                                    alt="{{ $route->name }}"
                                    class="h-60 w-full object-cover group-hover:scale-110 transition duration-700"
                                >
                            @else
                                <div class="h-60 bg-slate-200 flex items-center justify-center">
                                    <span class="text-slate-500">
                                        No image available
                                    </span>
                                </div>
                            @endif

                            <div class="absolute top-4 left-4">
                                <span class="bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                    Popular Route
                                </span>
                            </div>

                        </div>

                        <div class="p-6">

                            <div class="flex items-start justify-between gap-4">
                                <div>
<h3 class="text-xl font-bold text-slate-900">
                                        {{ $route->name }}
                                    </h3>

                                    <p class="mt-2 text-slate-500 text-sm">
                                        Premium transfer service
                                    </p>
                                </div>

                                <div class="text-right">
                                    <div class="text-2xl font-bold text-blue-600">
                                        {{ number_format($route->price) }}
                                    </div>

                                    <div class="text-xs text-slate-500">
                                        VND
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 space-y-4">

                                <div class="flex items-center gap-3 text-slate-600">
                                    <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                        📍
                                    </div>

                                    <div>
                                        <div class="text-xs text-slate-400">
                                            Pickup
                                        </div>

                                        <div class="font-medium">
                                            {{ $route->pickup_point }}
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 text-slate-600">
                                    <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center">
                                        🏁
                                    </div>

                                    <div>
                                        <div class="text-xs text-slate-400">
                                            Dropoff
                                        </div>

                                        <div class="font-medium">
                                            {{ $route->dropoff_point }}
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 text-slate-600">
                                    <div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center">
                                        ⏱️
                                    </div>

                                    <div>
                                        <div class="text-xs text-slate-400">
                                            Duration
</div>

                                        <div class="font-medium">
                                            {{ $route->duration_minutes }} minutes
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-8">
                                <a
                                    href="{{ route('routes.show', $route) }}"
                                    class="w-full inline-flex items-center justify-center rounded-2xl bg-slate-900 hover:bg-blue-600 transition-all duration-300 text-white font-semibold py-3"
                                >
                                    View Details
                                </a>
                            </div>

                        </div>

                    </article>

                @empty

                    <div class="col-span-full">
                        <div class="bg-white rounded-3xl p-12 text-center shadow-sm">
                            <h3 class="text-2xl font-bold
