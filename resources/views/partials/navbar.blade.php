<nav class="flex items-center justify-between px-6 py-4 bg-white">
    <!-- Logo Section -->
    <div class="text-xl font-bold">
        <a href="{{route('Home')}}"><img class="w-20" src="{{asset('storage/photos/LOGO.png')}}" alt="LOGO"></a>
    </div>

    <!-- Navigation Links -->
    <div class="flex items-center space-x-8">
        <a href="{{route('Home')}}" class="text-gray-600 hover:text-gray-900">Home</a>
        <a href="{{ route('About') }}" class="text-gray-600 hover:text-gray-900">About</a>
        <a href="{{route('Products')}}" class="text-gray-600 hover:text-gray-900">Products</a>
        <a href="{{route('Workers')}}" class="text-gray-600 hover:text-gray-900">Workers</a>
        <a href="{{route('Contact')}}" class="text-gray-600 hover:text-gray-900">Contact</a>
    </div>

    <!-- Account Button -->
    <div class="flex items-center">
        @auth
        <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
            <span>Account</span>
        </button>
        @endauth
        <div class="flex items-center gap-4">
            <a href="#"><button class="cursor-pointer">Log In</button></a>
            <a href="#"><button class="bg-amber-400 text-white px-5 py-2 rounded-full hover:bg-amber-500 cursor-pointer duration-200">Sign Up</button></a>
        </div>
    </div>
</nav>
