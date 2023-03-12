<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trips') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- create trip --}}
        <form action="{{ route('trips.store') }}" method="POST">
            @csrf
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
                <label for="route_id">Route</label>
                <select name="route_id" id="route_id" class="form-control">
                    @foreach ($routes as $route)
                        <option value="{{ $route->id }}">{{ $route->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
                <label for="bus_id">Bus</label>
                <select name="bus_id" id="bus_id" class="form-control">
                    @foreach ($buses as $bus)
                        <option value="{{ $bus->id }}">{{ $bus->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
                <label for="departure_time">Departure</label>
                <input type="datetime-local" name="departure_time" id="departure_time" class="form-control">
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
                <label for="arrival_time">Arrival</label>
                <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control">
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
                <button type="submit" class="btn btn-primary text-dark">Add Trip</button>
            </div>

        </form>

    </div>
</x-app-layout>
