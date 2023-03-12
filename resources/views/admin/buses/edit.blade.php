<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buses')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('buses.update', $bus->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="mb-4">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" name="name" id="name" placeholder="Bus Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ $bus->name }}">
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="number" class="sr-only">Number</label>
                            <input type="text" name="number" id="number" placeholder="Bus Number" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('number') border-red-500 @enderror" value="{{ $bus->number }}">
                            @error('number')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="seats" class="sr-only">Seats</label>
                            <input type="text" name="seats" id="seats" placeholder="Bus Seats" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('seats') border-red-500 @enderror" value="{{ $bus->seats }}">
                            @error('seats')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="type" class="sr-only">Type</label>
                            <select name="type" id="type" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('type') border-red-500 @enderror">
                                <option value="">Select Bus Type</option>
                                <option value="AC" {{ $bus->type == 'AC' ? 'selected' : '' }}>AC</option>
                                <option value="Non-AC" {{ $bus->type == 'Non-AC' ? 'selected' : '' }}>Non-AC</option>
                            </select>
                            @error('type')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-dark font-bold py-2 px-4 rounded">Update Bus</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</x-app-layout>
