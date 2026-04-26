<x-layouts.app :title="'Weather Fetch'">

    <x-slot:sidebar>
        @include('partials.sidebar')
    </x-slot:sidebar>

    <div class="space-y-5">

        <!-- Header -->
        <section class="rounded-[28px] border border-white/60 bg-white/85 p-5 shadow-md">
            <h2 class="text-xl font-bold text-slate-800">
                Weather Fetch
            </h2>

            <p class="text-sm text-slate-500">
                Choose Country, State and City.
            </p>
        </section>

        <!-- Form -->
        <section class="rounded-[28px] border border-white/60 bg-white/92 p-6 shadow-md">

            <form method="POST"
                action="{{ route('weather.fetch') }}">

                @csrf

                <div class="grid md:grid-cols-4 gap-4">

                    <!-- Country -->
                    <div>
                        <label class="block mb-2 text-sm font-semibold">
                            Country
                        </label>

                        <select id="country"
                            onchange="loadStates()"
                            class="w-full rounded-2xl border px-4 py-3">

                            <option value="">
                                Choose Country
                            </option>

                        </select>
                    </div>

                    <!-- State -->
                    <div>
                        <label class="block mb-2 text-sm font-semibold">
                            State
                        </label>

                        <select id="state"
                            onchange="loadCities()"
                            class="w-full rounded-2xl border px-4 py-3">

                            <option value="">
                                Choose State
                            </option>

                        </select>
                    </div>

                    <!-- City -->
                    <div>
                        <label class="block mb-2 text-sm font-semibold">
                            City
                        </label>

                        <select id="city"
                            name="city"
                            class="w-full rounded-2xl border px-4 py-3">

                            <option value="">
                                Choose City
                            </option>

                        </select>
                    </div>

                    <!-- Button -->
                    <div class="flex items-end">
                        <button type="submit"
                            class="w-full rounded-2xl bg-blue-600 px-4 py-3 text-white font-semibold">
                            Fetch Weather
                        </button>
                    </div>

                </div>

            </form>

        </section>

        <!-- Result -->
        @if(isset($weather))
        <section class="rounded-[28px] border border-white/60 bg-white/92 p-6 shadow-md">

            <h3 class="text-xl font-bold text-slate-800 mb-4">
                {{ $city }}
            </h3>

            <div class="space-y-2 text-slate-700">
                <p>🌡 Temperature:
                    {{ $weather['temp_C'] }} °C
                </p>

                <p>☁ Weather:
                    {{ $weather['weatherDesc'][0]['value'] }}
                </p>

                <p>💨 Wind:
                    {{ $weather['windspeedKmph'] }} km/h
                </p>

                <p>💧 Humidity:
                    {{ $weather['humidity'] }}%
                </p>
            </div>

        </section>
        @endif

    </div>

<script>

let countriesData = [];

/* Load Countries */
async function loadCountries() {

    let response = await fetch(
        'https://countriesnow.space/api/v0.1/countries/states'
    );

    let data = await response.json();

    countriesData = data.data;

    let country = document.getElementById('country');

    data.data.forEach(item => {

        country.innerHTML += `
            <option value="${item.name}">
                ${item.name}
            </option>
        `;
    });
}

/* Load States */
function loadStates() {

    let countryName =
        document.getElementById('country').value;

    let state =
        document.getElementById('state');

    let city =
        document.getElementById('city');

    state.innerHTML =
        `<option value="">Choose State</option>`;

    city.innerHTML =
        `<option value="">Choose City</option>`;

    let selected = countriesData.find(
        item => item.name == countryName
    );

    if(!selected) return;

    selected.states.forEach(item => {

        state.innerHTML += `
            <option value="${item.name}">
                ${item.name}
            </option>
        `;
    });
}

/* Load Cities */
async function loadCities() {

    let country =
        document.getElementById('country').value;

    let state =
        document.getElementById('state').value;

    let response = await fetch(
        'https://countriesnow.space/api/v0.1/countries/state/cities',
        {
            method: 'POST',
            headers: {
                'Content-Type':'application/json'
            },
            body: JSON.stringify({
                country: country,
                state: state
            })
        }
    );

    let data = await response.json();

    let city =
        document.getElementById('city');

    city.innerHTML =
        `<option value="">Choose City</option>`;

    data.data.forEach(item => {

        city.innerHTML += `
            <option value="${item}">
                ${item}
            </option>
        `;
    });
}

loadCountries();

</script>

</x-layouts.app>