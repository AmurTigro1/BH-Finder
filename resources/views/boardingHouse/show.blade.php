@extends('layout.main')

@section('title', 'FindBoard')

@section('content')
    {{-- <form action="{{ route('bh.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="address" id="address" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image URL</label>
            <input type="text" name="image" id="image" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div>
            <label for="monthly" class="block text-sm font-medium text-gray-700">Monthly Rent</label>
            <input type="number" name="monthly" id="monthly" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <button type="submit" class="mt-4 bg-blue-500 text-black py-2 px-4 rounded">Submit</button>
    </form>
     --}}
     <section class="py-16 px-4 bg-gray-50">
        <div class="container mx-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden"> 
                <!-- Image -->
                    <div class="flex items-center bg-white rounded-lg shadow-md overflow-hidden">
                        <!-- Image -->
                        <img src="{{ $bh->image }}" alt="{{ $bh->name }}" class="w-[200px] md:w-[300px] h-auto object-contain border-r-2 border-gray-200">
                        
                        <!-- Content -->
                        <div class="p-4">
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">{{ $bh->name }}</h1>
                            <p class="text-lg text-gray-700 mb-2"><strong>Address:</strong> {{ $bh->address }}</p>
                            <p class="text-xl text-blue-600 mb-6 font-semibold">Monthly Rent: ₱{{ $bh->monthly }}</p>
                        </div>
                    </div>
                <!-- Google Map Display -->
                    <div id="map" class="rounded-md overflow-hidden mb-6" style="height: 400px; width: 100%;"></div>
    
                    <!-- Action Buttons -->
                    <div class="flex justify-start space-x-4">
                        <a href="/" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-all duration-200">Back to Listings</a>
                        <a href="{{ route('room.show', $bh->id) }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg transition-all duration-200">View Rooms</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<@endsection

<script>
    function initMap() {
        var geocoder = new google.maps.Geocoder();
        var address = "{{ $bh->address }}";
        geocoder.geocode({ 'address': address }, function(results, status) {
            if (status === 'OK') {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: results[0].geometry.location
                });
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0yrDmeuHJAaLeRkuMgp3ivQq0m_8Wq8o&callback=initMap"></script>
