@extends('layout.main')

@section('title', 'FindBoard')

@section('content')
<section class="py-16 px-4">
    <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between">
        <div class="text-center lg:text-left max-w-xl lg:max-w-2xl mb-8 lg:mb-0">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 text-black">Discover Most Suitable Boarding House</h1>
            <p class="text-lg mb-6 text-black">Find a variety of boarding houses that suit you very easily, forget all difficulties in finding a boarding house for you.</p>
            <div class="flex flex-col sm:flex-row justify-center lg:justify-start items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <form class="flex items-center space-x-2 sm:space-x-4 w-full sm:w-auto" action="{{ route('bh.home') }}" method="GET">
                    <input type="text" placeholder="Search by location" class="w-full sm:w-auto border border-gray-700 rounded-md py-2 px-4 text-black focus:outline-none focus:ring-2 focus:ring-blue-500" name="search" value="{{ request()->query('search') }}">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-full sm:w-auto">Search</button>
                </form>
                
                <form class="flex items-center space-x-2 w-full sm:w-auto" action="{{ url()->current() }}" method="GET">
                    <label for="address" class="text-black">Filter by Address:</label>
                    <select name="address" id="address" class="w-full sm:w-auto border border-gray-700 text-black rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="Pob. Centro, Clarin, Bohol" {{ request('address') == 'Pob. Centro, Clarin, Bohol' ? 'selected' : '' }}>Clarin</option>
                        <option value="Tubigon, Bohol" {{ request('address') == 'Tubigon, Bohol' ? 'selected' : '' }}>Tubigon</option>
                        <option value="Inabanga" {{ request('address') == 'Inabanga' ? 'selected' : '' }}>Inabanga</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="relative w-full lg:w-auto mt-8 lg:mt-0">
            <div class="relative overflow-hidden rounded-lg h-64 sm:h-80 lg:h-full">
                <img src="https://i.pinimg.com/236x/1b/78/fa/1b78fadec746282e0c3e4dd4ffeac35e.jpg" alt="Building" class="w-full h-full object-cover lg:w-full">
                <div class="absolute inset-0 bg-gradient-to-b from-gray-900 to-black opacity-70 rounded-lg"></div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 px-4">
    <div class="container mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
            <h2 class="text-2xl sm:text-3xl font-bold text-black mb-4 sm:mb-0">Popular Residences</h2>
            <a href="{{ route('bh.all') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded">View All</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($bh as $bh)
                <div class="bg-white rounded-md overflow-hidden shadow-lg">
                    <img src="{{$bh->image}}" alt="House" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl sm:text-2xl font-bold text-black mb-2">₱{{$bh->monthly}}</h3>
                        <h4 class="text-lg sm:text-xl font-bold text-black mb-2">{{$bh->name}}</h4>
                        <p class="text-black">{{$bh->address}}</p>
                        <a href="{{ route('bh.show', $bh->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4 block text-center">Visit</a>
                       
                    </div>
                </div>
            @empty
                <p class="text-2xl sm:text-4xl font-bold text-black">
                    No results found<strong class="text-lg sm:text-2xl"> {{ request()->query('search') }} </strong>
                </p>
            @endforelse
        </div>
    </div> 
</section>
@endsection
