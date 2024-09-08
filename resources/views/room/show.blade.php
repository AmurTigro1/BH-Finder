@extends('layout.main')

@section('title', 'FindBoard')

@section('content')

<section class="py-12 px-4 bg-gray-100">
    <div class="container mx-auto">
        <div class="bg-white rounded-lg flex flex-col md:flex-row shadow-lg">

            <!-- Room Details -->
            <div class="md:w-1/2 p-6 md:p-8">
                <div class="relative group">
                    <img src="{{ $room->image }}" alt="{{ $room->name }}" class="h-56 md:h-72 w-full object-cover rounded-lg shadow-md">
                    <div class="absolute bottom-0 left-0 p-4 md:p-6 bg-black bg-opacity-50 w-full">
                        <h1 class="text-2xl md:text-3xl font-bold text-white">{{ $room->name }}</h1>
                    </div>
                </div>
                <p class="text-base md:text-lg text-gray-700 mt-4"><strong>Occupancy:</strong> {{ $room->occupancy }}</p>
                <p class="text-xl md:text-2xl text-blue-600 mb-6 font-bold">Monthly Rent: ₱{{ number_format($room->price, 2) }}</p>

                <!-- Action Buttons -->
                <div class="flex flex-col md:flex-row justify-start space-y-3 md:space-y-0 md:space-x-3 mt-4">
                    <a href="{{ route('bh.show', $room->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-md transition-all duration-300 shadow-md hover:shadow-lg">Back</a>
                    <a href="{{ route('account.login', $room->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-6 rounded-md transition-all duration-300 shadow-md hover:shadow-lg">Reserve</a>
                </div>
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
