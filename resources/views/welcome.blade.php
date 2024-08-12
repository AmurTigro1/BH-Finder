@extends('layout.main')

@section('title', 'FindBoard')

@section('content')
<section class="py-16 px-4">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
        <div class="text-center md:text-left max-w-xl md:max-w-2xl mb-8 md:mb-0">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 text-black">Discover Most Suitable Boarding House</h1>
            <p class="text-lg mb-6 text-black">Find a variety of boarding houses that suit you very easily, forget all difficulties in finding a boarding house for you.</p>
            <div class="flex flex-col md:flex-row justify-center md:justify-start items-center space-y-4 md:space-y-0 md:space-x-4">
                <form class="flex items-center space-x-4" action="{{ route('bh.home') }}" method="GET">
                    <input type="text" placeholder="Search by location" class=" border border-gray-700 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" name="search" value="{{ request()->query('search') }}">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Search</button>
                </form>
                <form class="flex items-center space-x-2" action="{{ url()->current() }}" method="GET">
                    <label for="address" class="text-black">Filter by Address:</label>
                    <select name="address" id="address" class=" border border-gray-700 text-black rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="Pob. Centro, Clarin, Bohol" {{ request('address') == 'Pob. Centro, Clarin, Bohol' ? 'selected' : '' }}>Clarin</option>
                        <option value="Tubigon, Bohol" {{ request('address') == 'Tubigon, Bohol' ? 'selected' : '' }}>Tubigon</option>
                        <option value="Inabanga" {{ request('address') == 'Inabanga' ? 'selected' : '' }}>Inabanga</option>
                    </select>
                </form>
            </div>
            {{-- <div class="flex justify-center md:justify-start mt-8 space-x-6">
                <div class="bg-gray-800 rounded-md p-4 text-center">
                    <h2 class="text-2xl font-bold mb-2">9K+</h2>
                    <p>Premium Product</p>
                </div>
                <div class="bg-gray-800 rounded-md p-4 text-center">
                    <h2 class="text-2xl font-bold mb-2">2K+</</h2>
                    <p>Happy Customer</p>
                </div>
                <div class="bg-gray-800 rounded-md p-4 text-center">
                    <h2 class="text-2xl font-bold mb-2">28K+</</h2>
                    <p>Awards Winning</p>
                </div>
            </div> --}}
        </div>
        <div class="relative">
            <div class="absolute inset-0 overflow-hidden rounded-lg">
                <img src="https://images.unsplash.com/photo-1542300176-83a654195724?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Building" class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900 to-black opacity-70 rounded-lg"></div>
        </div>
    </div>
</section>

<section class="py-16 px-4">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-black">Popular Residences</h2>
            <a href="{{ route('bh.all') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded">View All</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse ($bh as $bh)
                <div class="bg-white rounded-md overflow-hidden">
                    <img src="{{$bh->image}}" alt="House" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-2xl font-bold text-black mb-2">₱{{$bh->monthly}}</h3>
                        <h4 class="text-xl font-bold text-black mb-2">{{$bh->name}}</h4>
                        <p class="text-black">{{$bh->address}}</p>
                        <a href="{{ route('bh.show', $bh->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4 block text-center">Visit</a>
                    </div>
                </div>
            @empty
                <p class="text-4xl font-bold text-black">
                    No results found<strong class="text-2xl"> {{ request()->query('search') }} </strong>
                </p>
            @endforelse
        </div>
    </div> 
</section>
@endsection
