<!-- resources/views/LandLord/partials/sidebar.blade.php -->
<div class="w-1/4 bg-gray-800 h-screen">
    <div class="text-white text-center py-4">
        <h1 class="text-2xl font-bold">LandLord Dashboard</h1>
    </div>
    <ul class="mt-10 text-gray-400">
        <!-- Dashboard Link -->
        <li class="px-6 py-3 hover:bg-gray-700 {{ Route::is('landlord.dashboard') ? 'bg-gray-700 text-white' : '' }}">
            <a href="{{ route('landlord.dashboard') }}">Dashboard</a>
        </li>

        <!-- Add Room Link -->
        <li class="px-6 py-3 hover:bg-gray-700 {{ Route::is('landlord.add_room') ? 'bg-gray-700 text-white' : '' }}">
            <a href="{{ route('landlord.add_room') }}">Add Room</a>
        </li>

        <!-- Users Link -->
        <li class="px-6 py-3 hover:bg-gray-700 {{ Route::is('landlord.add_bh') ? 'bg-gray-700 text-white' : '' }}">
            <a href="{{ route('landlord.add_bh') }}">Add Boarding House</a>
        </li>
    </ul>
</div>
