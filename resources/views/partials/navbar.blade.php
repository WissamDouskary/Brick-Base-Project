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
        <a href="{{ route('Home') }}" 
           class="text-gray-600 hover:text-gray-900 relative py-2 {{ request()->routeIs('Home') ? 'text-gray-900 font-medium after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-gray-900' : '' }}">
            Home
        </a>
        <a href="{{ route('About') }}" 
           class="text-gray-600 hover:text-gray-900 relative py-2 {{ request()->routeIs('About') ? 'text-gray-900 font-medium after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-gray-900' : '' }}">
            About
        </a>
        <a href="{{ route('Products') }}" 
           class="text-gray-600 hover:text-gray-900 relative py-2 {{ request()->routeIs('Products') ? 'text-gray-900 font-medium after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-gray-900' : '' }}">
            Products
        </a>
        <a href="{{ route('Workers') }}" 
           class="text-gray-600 hover:text-gray-900 relative py-2 {{ request()->routeIs('Workers') ? 'text-gray-900 font-medium after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-gray-900' : '' }}">
            Workers
        </a>
        <a href="{{ route('Contact') }}" 
           class="text-gray-600 hover:text-gray-900 relative py-2 {{ request()->routeIs('Contact') ? 'text-gray-900 font-medium after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-gray-900' : '' }}">
            Contact
        </a>
    </div>

    <!-- Desktop Account Button (Hidden on Mobile) -->
    <div class="hidden lg:flex items-center space-x-4">
        @auth
            <div class="relative">
                <button id="account-dropdown-btn" class="flex items-center space-x-2 px-3 py-1.5 rounded-lg text-gray-700 hover:bg-gray-50 hover:border-gray-300 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <span>Account</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                @if(auth()->user()->role_id == 1)
                <!-- Account Dropdown Menu -->
                <div id="account-dropdown"
                    class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg overflow-hidden z-50 transform scale-0 origin-top-right transition-transform duration-200 ease-in-out">
                    <div class="p-3 border-b">
                        <div class="flex items-center space-x-2">
                            <div class="relative flex-shrink-0">
                                <img class="w-8 h-8 rounded-full object-cover"
                                    src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="Profile Photo">
                                <div
                                    class="absolute bottom-0 right-0 w-2 h-2 bg-green-500 rounded-full border border-white">
                                </div>
                            </div>
                            <div class="flex-grow min-w-0">
                                <div class="font-medium text-sm text-gray-800 truncate">
                                    {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</div>
                                <div class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="py-1">
                        <a href="{{ route('workerprofile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">View profile</a>
                        <a href="{{ route('product_list') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">List Product</a>
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">View Offers</a>
                        @if (Auth::user()->category == null)
                        <a href="{{ route('CompleteRegistration')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Complete Registration</a>
                        @endif
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                    </div>

                    <div class="border-t py-1">
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Support</a>
                    </div>

                    <div class="border-t py-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 cursor-pointer">Log
                                out</button>
                        </form>
                    </div>
                </div>
                @else
                <!-- Account Dropdown Menu -->
                <div id="account-dropdown"
                    class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg overflow-hidden z-50 transform scale-0 origin-top-right transition-transform duration-200 ease-in-out">
                    <div class="p-3 border-b">
                        <div class="flex items-center space-x-2">
                            <div class="relative flex-shrink-0">
                                <img class="w-8 h-8 rounded-full object-cover"
                                    src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="Profile Photo">
                                <div
                                    class="absolute bottom-0 right-0 w-2 h-2 bg-green-500 rounded-full border border-white">
                                </div>
                            </div>
                            <div class="flex-grow min-w-0">
                                <div class="font-medium text-sm text-gray-800 truncate">
                                    {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</div>
                                <div class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="py-1">
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">View profile</a>
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                    </div>

                    <div class="border-t py-1">
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Support</a>
                    </div>

                    <div class="border-t py-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 cursor-pointer">Log
                                out</button>
                        </form>
                    </div>
                </div>

                @endif

            </div>
        @else
            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}"><button class="cursor-pointer">Log In</button></a>
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
                    <!-- Mobile Account Dropdown -->
                    @if(auth()->user()->role_id == 1)
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="relative">
                                <img class="w-10 h-10 rounded-full object-cover"
                                    src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="Profile Photo">
                                <div
                                    class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 rounded-full border-2 border-white">
                                </div>
                            </div>
                            <div>
                                <div class="font-medium text-gray-800">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</div>
                                <div class="text-sm text-gray-500">{{ auth()->user()->email }}</div>
                            </div>
                        </div>

                        <a href="{{ route('workerprofile') }}" class="block py-2 text-gray-600 hover:text-gray-900">View profile</a>
                        <a href="{{ route('product_list') }}" class="block py-2 text-gray-600 hover:text-gray-900">List Product</a>
                        <a href="" class="block py-2 text-gray-600 hover:text-gray-900">View Offers</a>
                        @if (Auth::user()->category == null)
                        <a href="{{ route('CompleteRegistration')}}" class="block py-2 text-gray-600 hover:text-gray-900">Complete Registration</a>
                        @endif
                        <a href="" class="block py-2 text-gray-600 hover:text-gray-900">Settings</a>
                        <a href="" class="block py-2 text-gray-600 hover:text-gray-900">Support</a>

                        <form method="POST" action="">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left py-2 text-gray-600 hover:text-gray-900">Log out</button>
                        </form>
                    </div>
                    @else
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="relative">
                                <img class="w-10 h-10 rounded-full object-cover"
                                    src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="Profile Photo">
                                <div
                                    class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 rounded-full border-2 border-white">
                                </div>
                            </div>
                            <div>
                                <div class="font-medium text-gray-800">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</div>
                                <div class="text-sm text-gray-500">{{ auth()->user()->email }}</div>
                            </div>
                        </div>

                        <a href="" class="block py-2 text-gray-600 hover:text-gray-900">View profile</a>
                        <a href="" class="block py-2 text-gray-600 hover:text-gray-900">Settings</a>
                        <a href="" class="block py-2 text-gray-600 hover:text-gray-900">Support</a>

                        <form method="POST" action="">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left py-2 text-gray-600 hover:text-gray-900">Log out</button>
                        </form>
                    </div>
                    @endif
                @else
                    <div class="flex flex-col space-y-4">
                        <a href="{{ route('login') }}"
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
    // Mobile menu toggle
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

    const accountDropdownBtn = document.getElementById('account-dropdown-btn');
    const accountDropdown = document.getElementById('account-dropdown');

    if (accountDropdownBtn) {
        accountDropdownBtn.addEventListener('click', function() {
            accountDropdown.classList.toggle('scale-0');
            accountDropdown.classList.toggle('scale-100');
        });

        document.addEventListener('click', function(event) {
            if (!accountDropdownBtn.contains(event.target) && !accountDropdown.contains(event.target)) {
                accountDropdown.classList.add('scale-0');
                accountDropdown.classList.remove('scale-100');
            }
        });
    }
</script>
