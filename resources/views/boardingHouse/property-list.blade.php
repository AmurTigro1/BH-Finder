@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Property List</h1>

    <!-- Display the list of properties, if any -->
    <div class="mb-6">
        <ul>
            @foreach ($properties as $property)
                <li>{{ $property->name }} - {{ $property->location }}</li>
            @endforeach
        </ul>
    </div>

    <!-- Property Form -->
    <h2 class="text-xl font-semibold mb-2">Add a New Property</h2>
    <form action="{{ route('bh.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Property Name:</label>
            <input type="text" id="name" name="name" class="border border-gray-300 rounded px-3 py-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="location" class="block text-gray-700">Location:</label>
            <input type="text" id="location" name="location" class="border border-gray-300 rounded px-3 py-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description:</label>
            <textarea id="description" name="description" class="border border-gray-300 rounded px-3 py-2 w-full" rows="4"></textarea>
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection
