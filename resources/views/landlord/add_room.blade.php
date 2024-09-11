<!-- resources/views/LandLord/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LandLord Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Include Sidebar -->
        @include('LandLord.partials.sidebar')

        <!-- Main Content -->
        <div class="w-3/4 p-6">
            <h2 class="text-3xl font-semibold text-gray-700 mb-6">Add New Room</h2>

            <form action="{{route('landlord.create_room')}}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                <!-- Image -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Room Image:</label>
                    <input type="file" id="image" value="Add Room" name="image" class="w-full border border-gray-300 p-2 rounded-lg">
                </div>

                <!-- Occupancy -->
                <div class="mb-4">
                    <label for="occupancy" class="block text-gray-700">Occupancy:</label>
                    <input type="number" id="occupancy" name="occupancy" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Enter occupancy">
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Price:</label>
                    <input type="text" id="price" name="price" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Enter price">
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description:</label>
                    <textarea id="description" name="description" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Enter room description"></textarea>
                </div>

                <!-- Room Type Dropdown -->
                <div class="mb-4">
                    <label for="room_type" class="block text-gray-700">Room Type:</label>
                    <select id="room_type" name="room_type" class="w-full border border-gray-300 p-2 rounded-lg">
                        <option selected value="single">Single</option>
                        <option value="double">Double</option>
                        <option value="suite">Suite</option>
                    </select>
                </div>

                <!-- Wifi Dropdown -->
                <div class="mb-4">
                    <label for="wifi" class="block text-gray-700">Wifi Available:</label>
                    <select id="wifi" name="wifi" class="w-full border border-gray-300 p-2 rounded-lg">
                        <option selected value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <!-- Boarding House ID (Hidden or Auto-generated field) -->
                {{-- <input type="hidden" name="boarding_house_id" value="{{ $boarding_house_id }}"> --}}

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-700">Add Room</button>
                </div>
            </
