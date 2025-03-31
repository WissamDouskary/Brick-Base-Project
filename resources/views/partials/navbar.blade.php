<nav class="flex items-center justify-between px-6 py-4 bg-white relative">
    <!-- Logo Section -->
    <div class="text-xl font-bold">
        <a href="{{ route('Home') }}"><img class="w-20" src="{{ asset('storage/photos/LOGO.png') }}" alt="LOGO"></a>
    </div>

    <!-- Burger Menu Button (Mobile Only) -->
    <button id="burger-menu" class="lg:hidden focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Desktop Navigation Links (Hidden on Mobile) -->
    <div class="hidden lg:flex items-center space-x-8">
        <a href="{{ route('Home') }}" class="text-gray-600 hover:text-gray-900">Home</a>
        <a href="{{ route('About') }}" class="text-gray-600 hover:text-gray-900">About</a>
        <a href="{{ route('Products') }}" class="text-gray-600 hover:text-gray-900">Products</a>
        <a href="{{ route('Workers') }}" class="text-gray-600 hover:text-gray-900">Workers</a>
        <a href="{{ route('Contact') }}" class="text-gray-600 hover:text-gray-900">Contact</a>
    </div>

    <!-- Desktop Account Button (Hidden on Mobile) -->
    <div class="hidden lg:flex items-center space-x-4">
        @auth
            <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
                <span>Account</span>
            </button>
        @else
            <div class="flex items-center gap-4">
                <a href="{{ route('LogIn') }}"><button class="cursor-pointer">Log In</button></a>
                <a href="{{ route('SignUp') }}"><button
                        class="bg-amber-400 text-white px-5 py-2 rounded-full hover:bg-amber-500 cursor-pointer duration-200">Sign
                        Up</button></a>
            </div>
        @endauth
    </div>

    <!-- Mobile Menu (Hidden by Default) -->
    <div id="mobile-menu"
        class="fixed inset-0 bg-white z-50 transform translate-x-full transition-transform duration-300 ease-in-out lg:hidden">
        <div class="flex flex-col h-full">
            <!-- Mobile Menu Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <div class="text-xl font-bold">
                    <a href="{{ route('Home') }}"><img class="w-20" src="{{ asset('storage/photos/LOGO.png') }}"
                            alt="LOGO"></a>
                </div>
                <button id="close-menu" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation Links -->
            <div class="flex flex-col py-8 px-6 space-y-6 flex-grow overflow-y-auto">
                <a href="{{ route('Home') }}" class="text-gray-600 hover:text-gray-900 text-lg">Home</a>
                <a href="{{ route('About') }}" class="text-gray-600 hover:text-gray-900 text-lg">About</a>
                <a href="{{ route('Products') }}" class="text-gray-600 hover:text-gray-900 text-lg">Products</a>
                <a href="{{ route('Workers') }}" class="text-gray-600 hover:text-gray-900 text-lg">Workers</a>
                <a href="{{ route('Contact') }}" class="text-gray-600 hover:text-gray-900 text-lg">Contact</a>
            </div>

            <!-- Mobile Account Section -->
            <div class="border-t px-6 py-8">
                @auth
                    <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-900 mb-6 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Account</span>
                    </button>
                @else
                    <div class="flex flex-col space-y-4">
                        <a href="{{ route('LogIn') }}"
                            class="text-center py-2 border border-gray-300 rounded-full text-gray-600 hover:bg-gray-50 cursor-pointer duration-200">Log
                            In</a>
                        <a href="{{ route('SignUp') }}"
                            class="text-center bg-amber-400 text-white py-2 rounded-full hover:bg-amber-500 cursor-pointer duration-200">Sign
                            Up</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<script>
    const burgerMenu = document.getElementById('burger-menu');
    const closeMenu = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');

    burgerMenu.addEventListener('click', function() {
        mobileMenu.classList.remove('translate-x-full');
        document.body.classList.add('overflow-hidden');
    });

    closeMenu.addEventListener('click', function() {
        mobileMenu.classList.add('translate-x-full');
        document.body.classList.remove('overflow-hidden');
    });

    const mobileLinks = mobileMenu.querySelectorAll('a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', function() {
            mobileMenu.classList.add('translate-x-full');
            document.body.classList.remove('overflow-hidden');
        });
    });
</script>
