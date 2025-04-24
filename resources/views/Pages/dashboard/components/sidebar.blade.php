<aside class="w-60 bg-white border-r border-gray-200 h-full flex flex-col">
    <!-- Logo -->
    <div class="p-6">
        <a href="/" class="flex items-center">
            <a href="{{ route('Home') }}"><img class="w-20" src="{{ asset('storage/photos/LOGO.png') }}" alt="LOGO"></a>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 space-y-1">
        <a href="{{ route('dashboard.reports')}}" class="flex items-center px-4 py-3 {{ request()->routeIs('dashboard.reports') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-100' }}  rounded-lg group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 3v18h18"></path>
                <path d="m19 9-5 5-4-4-3 3"></path>
            </svg>
            <span class="font-medium">Reports</span>
        </a>

        <a href="{{ route('dashboard.people') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('dashboard.people') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-100' }} rounded-lg group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
            <span class="font-medium">People</span>
        </a>

        <a href="{{ route('dashboard.activities') }}" class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('dashboard.activities') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-100' }} group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                <line x1="3" x2="21" y1="9" y2="9"></line>
                <line x1="9" x2="9" y1="21" y2="9"></line>
            </svg>
            
            <span class="font-medium">Products</span>

        </a>

        <a href="{{ route('dashboard.comments') }}" class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('dashboard.comments') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-100' }} group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            <span class="font-medium">Comments</span>
        </a>
    </nav>

    <!-- Support Section -->
    <div class="px-6 py-4">
        <h2 class="text-gray-500 text-sm font-medium">Support</h2>
    </div>

    <!-- Settings -->
    <div class="px-4 pb-6">
        <a href="" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
            <span class="font-medium">Settings</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 group w-full mt-1 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                <span class="font-medium">Log out</span>
            </button>
        </form>
    </div>

    <div class="mt-10 border-t-1 border-gray-300 p-6">
        <p class="text-bold text-md select-none">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        <p class="text-sm text-gray-600 select-none">{{ Auth::user()->email }}</p>
    </div>
</aside>
