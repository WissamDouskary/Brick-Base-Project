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
            <form action="{{ route('worker.profile.edit') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">
                            Description
                        </label>
                        <input type="text" name="bio" id="bio" value="{{ auth()->user()->bio }}"
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

                <div class="mb-8 mt-8">
                    <label for="photos" class="block text-sm font-medium text-gray-700 mb-1">
                        Photos <span class="text-red-500">*</span>
                        <span class="text-xs text-gray-500 font-normal ml-1">(Upload up to 6 photos)</span>
                    </label>

                    <div class="mt-2">
                        <!-- photo input -->
                        <div class="flex items-center justify-center w-full">
                            <label for="photos"
                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-3 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="mb-1 text-sm text-gray-500">Click to upload photos</p>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF (MAX. 6 photos)</p>
                                </div>
                                <input id="photos" name="photos[]" type="file" class="hidden" multiple
                                    accept="image/*" onchange="previewPhotos(this)" />
                            </label>
                        </div>

                        <!-- Preview area -->
                        <div id="photo-preview-container" class="grid grid-cols-6 gap-4 mt-4"></div>
                    </div>

                    @error('photos')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('photos.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200 cursor-pointer">
                        Save
                    </button>
                </div>
            </form>
        </div>

        <!-- My Products Section -->
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-6">My Products</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="" alt="photo" class="w-full h-48 object-cover">

                    <div class="p-4">
                        <div class="mb-3">
                            <button class="bg-amber-400 text-white text-xs px-3 py-1 rounded">Contact with Seller</button>
                        </div>

                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-gray-900 font-medium uppercase">haha</h4>
                            <p class="text-xs text-gray-500">from ana</p>
                        </div>

                        <p class="text-sm text-gray-600 mb-4">dido</p>

                        <div class="flex space-x-2">
                            <a href=""
                                class="flex-1 bg-green-500 text-white text-center py-1 rounded hover:bg-green-600 transition duration-200">
                                Edit
                            </a>
                            <form action="" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full bg-red-500 text-white text-center py-1 rounded hover:bg-red-600 transition duration-200">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Fallback for empty products -->
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500">You haven't listed any products yet.</p>
                    <a href=""
                        class="mt-4 inline-block px-6 py-2 bg-amber-400 text-white rounded-full hover:bg-amber-500 transition duration-200">
                        List Your First Product
                    </a>
                </div>
            </div>
            <!-- Pagination -->
            <div class="flex justify-center mt-8 md:mt-10 px-2">
                <nav class="inline-flex flex-wrap justify-center rounded-md shadow">
                    <a href="#"
                        class="py-2 px-2 sm:px-4 border border-gray-300 bg-white rounded-l-md text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 mr-0 sm:mr-1 inline-block"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span class="hidden sm:inline">Previous</span>
                    </a>
                    <a href="#"
                        class="py-2 px-3 sm:px-4 border border-gray-300 text-yellow-400 text-white text-xs sm:text-sm font-medium">1</a>
                    <a href="#"
                        class="py-2 px-3 sm:px-4 border border-gray-300 bg-white text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                    <a href="#"
                        class="py-2 px-3 sm:px-4 border border-gray-300 bg-white text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 hidden xs:inline-block">3</a>
                    <span
                        class="py-2 px-3 sm:px-4 border border-gray-300 bg-white text-xs sm:text-sm font-medium text-gray-700 hidden sm:inline-block">...</span>
                    <a href="#"
                        class="py-2 px-3 sm:px-4 border border-gray-300 bg-white text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 hidden md:inline-block">67</a>
                    <a href="#"
                        class="py-2 px-3 sm:px-4 border border-gray-300 bg-white text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50">68</a>
                    <a href="#"
                        class="py-2 px-2 sm:px-4 border border-gray-300 bg-white rounded-r-md text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center">
                        <span class="hidden sm:inline">Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 ml-0 sm:ml-1 inline-block"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </div>
@endsection
<script>
    function previewPhotos(input) {
        const previewContainer = document.getElementById('photo-preview-container');
        previewContainer.innerHTML = '';

        const files = Array.from(input.files).slice(0, 6);

        if (files.length > 6) {
            alert('You can only upload a maximum of 6 photos. Only the first 6 will be used.');
        }

        files.forEach(file => {
            const reader = new FileReader();

            reader.onload = function(e) {
                const previewDiv = document.createElement('div');
                previewDiv.className =
                    'relative aspect-square border border-gray-200 rounded-md overflow-hidden';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-full object-cover';
                img.alt = 'Photo preview';

                previewDiv.appendChild(img);
                previewContainer.appendChild(previewDiv);
            }

            reader.readAsDataURL(file);
        });
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
