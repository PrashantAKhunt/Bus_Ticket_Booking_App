<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Routes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- create route --}}
        <form action="{{ route('routes.store') }}" method="POST">
            @csrf
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex flex-col p-2">
                            <label for="name" class="mb-2 uppercase font-bold text-lg text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="border py-2 px-3 text-grey-700" placeholder="Name">
                        </div>
                        <div class="flex flex-col p-2">
                            <label for="source_city_id" class="mb-2 uppercase font-bold text-lg text-gray-700">Source City</label>
                            <select name="source_city_id" id="source_city_id" class="border py-2 px-3 text-grey-700">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col p-2">
                            <label for="destination_city_id" class="mb-2 uppercase font-bold text-lg text-gray-700">Destination City</label>
                            <select name="destination_city_id" id="destination_city_id" class="border py-2 px-3 text-grey-700">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col p-2">
                            <label for="distance" class="mb-2 uppercase font-bold text-lg text-gray-700">Distance</label>
                            <input type="text" name="distance" id="distance" class="border py-2 px-3 text-grey-700" placeholder="Distance">
                        </div>
                        <div class="flex flex-col p-2">
                            <label for="duration" class="mb-2 uppercase font-bold text-lg text-gray-700">Duration</label>
                            <input type="text" name="duration" id="duration" class="border py-2 px-3 text-grey-700" placeholder="Duration">
                        </div>
                        <div class="flex flex-col p-2">
                            <button type="submit" class="btn btn-primary text-dark">Create Route</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
