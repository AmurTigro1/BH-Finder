<header class="py-6 px-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-blue-500 font-bold text-xl">FindBoard</a>
        <nav class="flex space-x-6 items-center">
            <a href="{{ route('bh.home') }}" class="{{ Request::routeIs('bh.home') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">Home</a>
            <a href="" class="{{ Request::routeIs('contact') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">Profile</a>
            
            <!-- User Dropdown -->
            <div class="relative">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Hello, {{ Auth::user()->name }}
                </button>
                
                <ul class="absolute left-0 mt-2 w-40 bg-white border border-gray-200 rounded shadow-lg hidden group-hover:block">
                    <li>
                        <a href="{{ route('account.logout') }}" class="block px-4 py-2 text-gray-700 hover:text-blue-500">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownButton = document.querySelector('.relative > button');
        const dropdownMenu = dropdownButton.nextElementSibling;

        dropdownButton.addEventListener('click', function (event) {
            event.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function () {
            dropdownMenu.classList.add('hidden');
        });
    });
</script>
