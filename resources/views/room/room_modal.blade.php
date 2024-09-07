<!-- rooms/partials/room-details.blade.php -->
<div class="p-6 md:p-8">
    <img src="{{$room->image}}" alt="Room Image" class="h-48 w-full object-cover rounded-lg mb-4">
    <p class="text-base md:text-lg text-gray-700 mb-3"><strong>Occupancy:</strong> {{ $room->occupancy }}</p>
    <p class="text-xl md:text-2xl text-blue-600 mb-6 font-bold">Monthly Rent: ₱{{ number_format($room->price, 2) }}</p>
    <div class="flex flex-col md:flex-row justify-start space-y-3 md:space-y-0 md:space-x-3">
        <a href="{{ route('bh.show', $room->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-md">Back</a>
        <a href="{{ route('account.login', $room->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-6 rounded-md">Reserve</a>
    </div>
</div>
