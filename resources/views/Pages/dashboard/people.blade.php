@extends('Pages.dashboard.layouts.app')

@section('content')

    @if (session('success'))
        <div id="successToast"
            class="fixed z-50 top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-md shadow-lg hidden opacity-0 transition-opacity duration-300">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="min-h-screen">
        <div class="ml-8 mt-8">
            <h1 class="text-2xl font-bold">People</h1>
        </div>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <!-- Filters -->
            <div class="mb-10">
                <form action="{{ route('dashboard.people') }}" method="GET"
                    class="flex gap-4 mb-4 justify-between items-end">
                    @csrf
                    <div class="flex w-2/3 gap-5">
                        <div class="w-1/2">
                            <label for="people" class="block text-sm font-medium text-gray-700 mb-1">People:</label>
                            <select id="people" name="role"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-2 py-2">
                                <option value="All" {{ request('role') == 'All' ? 'selected' : '' }}>All</option>
                                <option value="1" {{ request('role') == 1 ? 'selected' : '' }}>Workers</option>
                                <option value="2" {{ request('role') == 2 ? 'selected' : '' }}>Clients</option>
                            </select>
                        </div>

                        <div class="w-1/2">
                            <label for="topic" class="block text-sm font-medium text-gray-700 mb-1">Topic:</label>
                            <select id="topic" name="status"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-2 py-2">
                                <option value="All" {{ request('status') == 'All' ? 'selected' : '' }}>All</option>
                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive </option>
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm cursor-pointer">
                        Filter
                    </button>
                </form>
            </div>

            <!-- People Table -->
            <div class="bg-white {{ count($users) > 0 ? 'shadow' : '' }} overflow-hidden sm:rounded-lg">
                <div class="overflow-x-auto">
                    @if (count($users) > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Full name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $user->first_name . ' ' . $user->last_name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">{{ $user->created_at->format('F d, Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                {{ $user->role_id == 1 ? 'Worker' : 'Client' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_active ? 'text-blue-800 bg-blue-100' : 'bg-red-100 text-red-800' }}">
                                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-gray-400 hover:text-gray-500"
                                                onclick="toggleSidebar({{ $user->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="w-full flex justify-center">
                            <div class="bg-white rounded-lg p-8 text-center max-w-xl">
                                <div class="flex justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-700 mb-2">No Users Available
                                </h3>
                                <p class="text-gray-500 mb-6 max-w-md mx-auto">We couldn't find any User matching
                                    your
                                    criteria. Please try adjusting your search or check back later.</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 flex justify-between sm:hidden">
                            <a href="#"
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                            </a>
                            <a href="#"
                                class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Person Details Sidebars -->
    @foreach ($users as $user)
        <div id="personDetailsSidebar-{{ $user->id }}"
            class="fixed inset-y-0 right-0 w-80 bg-white shadow-xl transform translate-x-full transition-transform duration-300 ease-in-out z-40">
            <div class="h-full flex flex-col">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">Person Details</h3>
                    <button type="button" onclick="toggleSidebar({{ $user->id }})"
                        class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 overflow-y-auto p-6">
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('storage/' . $user->profile_photo . '') }}"
                            class="h-16 w-16 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-xl font-bold">

                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">
                                {{ $user->first_name . ' ' . $user->last_name }}</h4>
                            <p class="text-sm text-gray-500">
                                {{ $user->role_id == 1 ? 'Worker' : 'Client' }}</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h5 class="text-sm font-medium text-gray-500 mb-2">Contact
                                Information</h5>
                            <div class="bg-gray-50 rounded-md p-4">
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-500">Email</p>
                                        <p class="text-sm text-gray-900">{{ $user->email }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Location</p>
                                        <p class="text-sm text-gray-900">{{ $user->city }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h5 class="text-sm font-medium text-gray-500 mb-2">Account
                                Information</h5>
                            <div class="bg-gray-50 rounded-md p-4">
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-500">Status</p>
                                        <p class="text-sm">
                                            <span
                                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_active ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Member Since</p>
                                        <p class="text-sm text-gray-900">{{ $user->created_at->format('F d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 border-t border-gray-200">
                    <div class="flex space-x-3 w-full">
                        @if ($user->is_active)
                            <form action="{{ route('dashboard.people.status', ['id' => $user->id, 'status' => 0]) }}"
                                method="POST" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="cursor-pointer px-4 py-2 text-sm font-medium text-red-700 bg-red-100 border border-transparent rounded-md shadow-sm hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Deactivate
                                </button>
                            </form>
                        @else
                            <form action="{{ route('dashboard.people.status', ['id' => $user->id, 'status' => 1]) }}"
                                method="POST" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="cursor-pointer px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 border border-transparent rounded-md shadow-sm hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Activate
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function toggleSidebar(id) {
            const sidebar = document.getElementById('personDetailsSidebar-' + id);
            if (sidebar.classList.contains('translate-x-full')) {
                sidebar.classList.remove('translate-x-full');
            } else {
                sidebar.classList.add('translate-x-full');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const toast = document.getElementById('successToast');

            if (toast) {
                toast.classList.remove('hidden');
                toast.classList.add('opacity-0');

                toast.classList.add('opacity-100');
                toast.classList.add('transition-opacity')
                setTimeout(function() {
                    toast.classList.remove('opacity-100');

                    setTimeout(function() {
                        toast.classList.add('hidden');
                    }, 300);
                }, 5000);
            }
        });
    </script>
@endsection
