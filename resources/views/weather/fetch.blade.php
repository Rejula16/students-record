<x-layouts.app :title="'Weather Result'">

    <x-slot:sidebar>
        @include('partials.sidebar')
    </x-slot:sidebar>

    <div class="space-y-5">

        <!-- Header -->
        <section class="rounded-[28px] border border-white/60 bg-white/85 p-5 shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold text-slate-800">
                        Weather Result
                    </h2>

                    <p class="text-sm text-slate-500">
                        Live weather details for selected city.
                    </p>
                </div>

                <a href="{{ route('weather.index') }}"
                    class="rounded-2xl bg-slate-100 px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-200">
                    Back
                </a>
            </div>
        </section>

        <!-- Result Card -->
        <section class="rounded-[28px] border border-white/60 bg-white/92 p-6 shadow-md">

            <h3 class="text-2xl font-bold text-slate-800 mb-4">
                {{ $city }}
            </h3>

            <div class="grid md:grid-cols-2 gap-4 text-slate-700">

                <div class="rounded-2xl bg-slate-100 p-4">
                    🌡 Temperature
                    <p class="text-xl font-bold mt-1">
                        {{ $weather['temp_C'] }} °C
                    </p>
                </div>

                <div class="rounded-2xl bg-slate-100 p-4">
                    ☁ Condition
                    <p class="text-xl font-bold mt-1">
                        {{ $weather['weatherDesc'][0]['value'] }}
                    </p>
                </div>

                <div class="rounded-2xl bg-slate-100 p-4">
                    💨 Wind Speed
                    <p class="text-xl font-bold mt-1">
                        {{ $weather['windspeedKmph'] }} km/h
                    </p>
                </div>

                <div class="rounded-2xl bg-slate-100 p-4">
                    💧 Humidity
                    <p class="text-xl font-bold mt-1">
                        {{ $weather['humidity'] }}%
                    </p>
                </div>

            </div>

        </section>

    </div>

</x-layouts.app>