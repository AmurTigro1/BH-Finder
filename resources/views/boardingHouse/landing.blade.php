@extends('layout.main')

@section('title', 'FindBoard')

@section('content')
    <section class="py-16 px-4">
        <div class="container mx-auto">
            <div class="flex justify-start mb-8">
                <form class="flex items-center space-x-4" action="{{ route('bh.all') }}" method="GET">
                    <input type="text" placeholder="Search by location" class="bg-white border text-black border-black rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" name="search" value="{{ request()->query('search') }}">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Search</button>
                </form>
            </div>

            <h2 class="text-3xl font-bold text-black mb-8">Popular Residences</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($bh as $residence)
                    <div class="bg-white rounded-md overflow-hidden">
                        <img src="{{ $residence->image }}" alt="House" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-2xl font-bold text-black mb-2">₱{{ $residence->monthly }}</h3>
                            <h4 class="text-xl font-bold text-black mb-2">{{ $residence->name }}</h4>
                            <p class="text-black">{{ $residence->address }}</p>
                            <a href="{{ route('bh.show', $residence->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4 block text-center">Visit</a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-xl font-bold">
                        No results found for <strong class="text-2xl">{{ request()->query('search') }}</strong>
                    </p>
                @endforelse
            </div>

            <!-- Pagination Controls -->
            <div class="mt-8 flex justify-end">
                {{ $bh->links() }}
            </div>
        </div> 
    </section>
@endsection
