<header class="py-6 px-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-blue-500 font-bold text-xl">FindBoard</a>
        
        <!-- Mobile Menu Button -->
        <button id="menu-btn" class="block md:hidden text-blue-500 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
        
        <!-- Navigation -->
        <nav id="menu" class="hidden md:flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6 absolute md:static top-16 left-0 w-full md:w-auto bg-white md:bg-transparent z-10 md:z-auto">
            <a href="{{ route('bh.home') }}" class="{{ Request::routeIs('bh.home') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">Home</a>
            <a href="{{ route('account.register') }}" class="{{ Request::routeIs('account.register') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">Register</a>
            <a href="{{ route('account.login') }}" class="{{ Request::routeIs('account.login') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">Login</a>
            <a href="" class="{{ Request::routeIs('contact') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">Contact</a>
            <a href="{{ route('property.list') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">List your Property</a>
        </nav>
    </div>
</header>

<script>
    // Toggle mobile menu
    document.getElementById('menu-btn').addEventListener('click', function() {
        const menu = document.getElementById('menu');
        menu.classList.toggle('hidden');
        menu.classList.toggle('flex'); // Ensure the menu is displayed as a flex container when visible
    });
</script>
