<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trips') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="GET" action="{{ route('find-trip') }}">
                        <div class="flex flex-col p-2">
                            <label for="source_city_id" class="mb-2 uppercase font-bold text-lg text-gray-700">Source</label>
                            <select name="source_city_id" id="source_city_id" class="border py-2 px-3 text-grey-700">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col p-2">
                            <label for="destination_city_id" class="mb-2 uppercase font-bold text-lg text-gray-700">Destination</label>
                            <select name="destination_city_id" id="destination_city_id" class="border py-2 px-3 text-grey-700">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col p-2">
                            <label for="departure_date" class="mb-2 uppercase font-bold text-lg text-gray-700">Departure</label>
                            <input type="date" name="departure_date" id="departure_date" class="border py-2 px-3 text-grey-700">
                        </div>
                        <div class="flex flex-col p-2">
                            <button type="submit" class="btn btn-primary text-dark">Find Trip</button>
                        </div>
                    </form>
                </div>


                @if($trips)
                    @foreach($trips as $trip)
                        <div>
                            <h2> {{ $trip->route->name }} </h2>
                            <p> {{ $trip->route->sourceCity->name }} - {{ $trip->route->destinationCity->name }} </p>
                            <p> {{ $trip->departure_time }} - {{ $trip->arrival_time }} </p>
                            <p> {{ $trip->price }} </p>
                            {{-- <a href="{{ route('book-trip', $trip->id) }}">Book</a> --}}

                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
