@extends('layout.main')

@section('title', 'FindBoard')

@section('content')

<section class="py-12 px-4 bg-gray-100">
    <div class="container mx-auto">
        <div class="bg-white rounded-lg ">

            <div class="relative group">
                <<img src="{{ $room->image }}" alt="{{ $room->name }}" class="h-56 md:h-72 cursor-pointer" 
                hx-get="{{ route('room.modal', $room->id) }}" 
                hx-target="#dynamicModal .modal-content"
                hx-swap="innerHTML"
                hx-on="click: if (document.querySelector('#dynamicModal')) { document.querySelector('#dynamicModal').classList.remove('hidden'); }">
           

                <div class="">
                    <div class="absolute bottom-0 left-0 p-4 md:p-6">
                        <h1 class="text-2xl md:text-3xl font-bold text-white">{{ $room->name }}</h1>
                    </div>
                </div>
            </div>

            <!-- Room Details -->
            <div class="p-6 md:p-8">
                <p class="text-base md:text-lg text-gray-700 mb-3"><strong>Occupancy:</strong> {{ $room->occupancy }}</p>
                <p class="text-xl md:text-2xl text-blue-600 mb-6 font-bold">Monthly Rent: ₱{{ number_format($room->price, 2) }}</p>

                <!-- Action Buttons -->
                <div class="flex flex-col md:flex-row justify-start space-y-3 md:space-y-0 md:space-x-3">
                    <a href="{{ route('bh.show', $room->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-md transition-all duration-300 shadow-md hover:shadow-lg">Back</a>
                    <a href="{{ route('account.login', $room->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-6 rounded-md transition-all duration-300 shadow-md hover:shadow-lg">Reserve</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Structure -->
<div id="dynamicModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg mx-auto">
        <div class="modal-content p-4">
            <!-- Content will be loaded here -->
        </div>
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500">&times;</button>
    </div>
</div>

<script>
    function closeModal() {
        document.getElementById('dynamicModal').classList.add('hidden');
    }
</script>

@endsection
