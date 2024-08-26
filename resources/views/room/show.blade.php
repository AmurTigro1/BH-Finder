@extends('layout.main')

@section('title', 'FindBoard')

@section('content')

<section class="py-16 px-4 bg-gray-50">
    <div class="container mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:shadow-2xl">
            <!-- Image Gallery -->
            <div class="relative group">
                <img src="{{ $room->image }}" alt="{{ $room->name }}" class="w-full h-72 md:h-96 object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                    <div class="absolute bottom-0 left-0 p-6">
                        <h1 class="text-3xl md:text-4xl font-extrabold text-white">{{ $room->name }}</h1>
                    </div>
                </div>
            </div>

            <!-- Room Details -->
            <div class="p-8">
                <p class="text-lg text-gray-700 mb-4"><strong>Occupancy:</strong> {{ $room->occupancy }}</p>
                <p class="text-2xl text-blue-600 mb-8 font-bold">Monthly Rent: ₱{{ number_format($room->price, 2) }}</p>

                <!-- Action Buttons -->
                <div class="flex flex-col md:flex-row justify-start space-y-4 md:space-y-0 md:space-x-4">
                    <a href="/" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">Back to Listings</a>
                    <a href="{{ route('account.login', $room->id) }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">Reserve</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
