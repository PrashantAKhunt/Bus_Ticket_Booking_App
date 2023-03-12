<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trips') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- edit route --}}
        <form action="{{ route('trips.update', $trip->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex flex-col p-2">
                            <label for="route_id" class="mb-2 uppercase font-bold text-lg text-gray-700">Route</label>
                            <select name="route_id" id="route_id" class="border py-2 px-3 text-grey-700">
                                @foreach ($routes as $route)
                                    <option value="{{ $route->id }}" {{ $route->id == $trip->route_id ? 'selected' : '' }}>{{ $route->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col p-2">
                            <label for="bus_id" class="mb-2 uppercase font-bold text-lg text-gray-700">Bus</label>
                            <select name="bus_id" id="bus_id" class="border py-2 px-3 text-grey-700">
                                @foreach ($buses as $bus)
                                    <option value="{{ $bus->id }}" {{ $bus->id == $trip->bus_id ? 'selected' : '' }}>{{ $bus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col p-2">
                            <label for="departure_time" class="mb-2 uppercase font-bold text-lg text-gray-700">Departure</label>
                            <input type="datetime-local" name="departure_time" id="departure_time" class="border py-2 px-3 text-grey-700" value="{{ $trip->departure_time }}">
                        </div>
                        <div class="flex flex-col p-2">
                            <label for="arrival_time" class="mb-2 uppercase font-bold text-lg text-gray-700">Arrival</label>
                            <input type="datetime-local" name="arrival_time" id="arrival_time" class="border py-2 px-3 text-grey-700" value="{{ $trip->arrival_time }}">
                        </div>
                        <div class="flex flex-col p-2">
                            <label for="price" class="mb-2 uppercase font-bold text-lg text-gray-700">Price</label>
                            <input type="text" name="price" id="price" class="border py-2 px-3 text-grey-700" placeholder="Price" value="{{ $trip->price }}">
                        </div>
                        <div class="flex flex-col p-2">
                            <button type="submit" class="btn btn-primary text-dark">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
