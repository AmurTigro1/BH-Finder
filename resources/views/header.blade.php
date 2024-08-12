<header class="py-6 px-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-blue-500 font-bold text-xl">FindBoard</a>
        <nav class="flex space-x-6">
            <a href="{{ route('bh.home') }}" class="{{ Request::routeIs('bh.home') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">Home</a>
            <a href="{{ route('account.register') }}" class="{{ Request::routeIs('account.register') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">Register</a>
            <a href="{{ route('account.login') }}" class="{{ Request::routeIs('account.login') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">Login</a>
            <a href="" class="{{ Request::routeIs('contact') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">Contact</a>
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Subscribe</button>
        </nav>
    </div>
</header>
