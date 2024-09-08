@extends('layout.userLayout')

@section('title', 'FindBoard')

@section('content')

<section class="py-12 px-4 bg-gray-100">
    <div class="container mx-auto">
        <div class="bg-white rounded-lg flex flex-col md:flex-row">

            <!-- Room Details -->
            <div class="md:w-1/2 p-6 md:p-8">
                <div class="relative group">
                    <img src="{{ $room->image }}" alt="{{ $room->name }}" class="h-56 md:h-72 w-full object-cover">
                    <div class="absolute bottom-0 left-0 p-4 md:p-6">
                        <h1 class="text-2xl md:text-3xl font-bold text-white">{{ $room->name }}</h1>
                    </div>
                </div>
                <p class="text-base md:text-lg text-gray-700 mt-3"><strong>Occupancy:</strong> {{ $room->occupancy }}</p>
                <p class="text-xl md:text-2xl text-blue-600 mb-6 font-bold">Monthly Rent: ₱{{ number_format($room->price, 2) }}</p>

                <!-- Action Buttons -->
                <div class="flex flex-col md:flex-row justify-start space-y-3 md:space-y-0 md:space-x-3">
                    <a href="{{ route('user-bh.show', $room->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-md transition-all duration-300 shadow-md hover:shadow-lg">Back</a>
                </div>
            </div>

            <!-- Reservation Form -->
<div class="md:w-1/2 bg-gray-50 p-6 md:p-8">
    <h2 class="text-xl font-bold mb-4 text-black">Reserve a Visit</h2>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session()->get('message') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 14.849a1 1 0 001.414 0l3.182-3.181a1 1 0 00-1.415-1.415l-3.181 3.182a1 1 0 000 1.414zM5.792 8.792a1 1 0 000-1.414l-3.181-3.182a1 1 0 10-1.415 1.415l3.182 3.181a1 1 0 001.414 0zm3.181 6.364a1 1 0 001.415 0l3.181-3.181a1 1 0 00-1.414-1.415l-3.182 3.182a1 1 0 000 1.414z"/></svg>
            </span>
        </div>
    @endif

    <form action="{{ route('room.reserve', $room->id) }}" method="POST">
        @csrf

        <!-- Name Field -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" name="name" id="name" 
            @if(Auth::id())
            value="{{ old('name') }} {{Auth::user()->name}}"
            @endif
            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
            @if($errors->has('name'))
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <!-- Phone Field -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
            @if($errors->has('phone'))
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('phone') }}</p>
            @endif
        </div>

        <!-- Email Field -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
            @if($errors->has('email'))
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <!-- Visit Date Field -->
        <div class="mb-4">
            <label for="visit_date" class="block text-gray-700 font-medium mb-2">Visit Date</label>
            <input type="date" name="visit_date" id="visit_date" value="{{ old('visit_date') }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
            @if($errors->has('visit_date'))
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('visit_date') }}</p>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-md transition-all duration-300 shadow-md hover:shadow-lg">Submit</button>
        </div>
    </form>
</div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script type="text/javascript">
    $(function(){
        var dtToday = new Date();
    
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();

        if(month < 10) month = '0' + month.toString();
        if(day < 10) day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('#visit_date').attr('min', maxDate);
    });
</script>
@endpush
