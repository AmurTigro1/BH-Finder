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

            <form action="{{route('landlord.create_bh')}}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                <!-- Image -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Boarding House Image:</label>
                    <input type="file" id="image" value="Add Boarding House" name="image" class="w-full border border-gray-300 p-2 rounded-lg">
                </div>

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Enter name">
                </div>
                

               <!-- Address -->
               <div class="mb-4">
                <label for="address" class="block text-gray-700">Address:</label>
                <select id="address" name="address" class="w-full border border-gray-300 p-2 rounded-lg">
                    <option value="Clarin, Bohol">Clarin, Bohol</option>
                    <option value="Tubigon, Bohol">Tubigon, Bohol</option>
                    <option value="Inabanga, Bohol">Inabanga, Bohol</option>
                    <option value="Tagbilaran City">Tagbilaran City</option>
                </select>
            </div>
                
                 <!-- Monthly -->
                 <div class="mb-4">
                    <label for="price" class="block text-gray-700">Price:</label>
                    <input type="text" id="price" name="price" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Enter price">
                </div>


                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-700">Add</button>
                </div>
            
