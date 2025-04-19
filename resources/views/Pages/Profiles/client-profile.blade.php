@extends('layouts.app')

@section('title', 'Brick Base - Worker Profile')

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

    <div class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Welcome Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Welcome, {{ auth()->user()->first_name }}
                {{ auth()->user()->last_name }}</h1>
            <p class="text-sm text-gray-500 mt-1">{{ now()->format('D, d F Y') }}</p>
        </div>

        <!-- Profile Banner -->
        <div class="w-full h-24 bg-gradient-to-r from-blue-200 to-blue-100 rounded-lg mb-6"></div>

        <!-- Profile Info -->
        <div class="flex items-center mb-10">
            <div class="mr-4">
                <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="Profile Photo"
                    class="w-20 h-20 rounded-full object-cover border-2 border-white shadow">
            </div>
            <div>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h2>
                <p class="text-gray-500">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <!-- My Information Section -->
        <div class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-medium text-gray-900">
                    My Informations</h3>
            </div>
            <form action="{{ route('client.profile.edit') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                            first name
                        </label>
                        <input type="text" name="first_name" id="first_name" value="{{ auth()->user()->first_name }}"
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400">
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">
                            last Name
                        </label>
                        <input type="text" name="last_name" id="last_name" value="{{ auth()->user()->last_name }}"
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400">
                    </div>

                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">
                            City
                        </label>
                        <select name="city" id="city"
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400">
                            <option value="" disabled>Select Your City</option>
                            <option value="Casablanca" {{ Auth::user()->city == 'Casablanca' ? 'selected' : '' }}>
                                Casablanca
                            </option>
                            <option value="Safi" {{ Auth::user()->city == 'Safi' ? 'selected' : '' }}>Safi</option>
                            <option value="Agadir" {{ Auth::user()->city == 'Agadir' ? 'selected' : '' }}>Agadir</option>
                            <option value="Oujda" {{ Auth::user()->city == 'Oujda' ? 'selected' : '' }}>Oujda</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200 cursor-pointer">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
<script>
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
