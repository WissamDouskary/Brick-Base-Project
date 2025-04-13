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

                    <div class="mb-6">
                        <label for="job_title" class="block text-sm font-medium text-gray-700 mb-1">
                            Price per Day
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="text" name="price" id="price" placeholder="Enter Price"
                                value="{{ Auth::user()->price }}"
                                class="block w-full pl-7 pr-12 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400"
                                required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">USD</span>
                            </div>
                        </div>
                        @error('job_title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
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
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <img src="{{ asset('storage/' . $product->main_image) }}" alt="photo"
                                class="w-full h-48 object-cover">

                            <div class="p-4">
                                <div class="mb-3">
                                    <button
                                        class="bg-amber-400 text-white text-xs px-3 py-1 rounded">{{ $product->category }}</button>
                                </div>

                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="text-gray-900 font-medium uppercase">{{ $product->title }}</h4>
                                    <p class="text-xs text-gray-500">from {{ Auth::user()->first_name }}</p>
                                </div>

                                <p class="text-sm text-gray-600 mb-4 truncate">{{ $product->description }}</p>

                                <div class="flex gap-4">
                                    <button onclick="openModal({{ $product->id }})"
                                        class="flex-1 cursor-pointer bg-green-500 text-white text-center py-1 rounded hover:bg-green-600 transition duration-200">
                                        Edit
                                    </button>
                                    <button type="submit" onclick="openDeleteModal({{ $product->id }})"
                                        class="w-1/2 cursor-pointer bg-red-500 text-white text-center py-1 rounded hover:bg-red-600 transition duration-200">
                                         Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="deleteModal-{{ $product->id }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70">
                            <div class="bg-white rounded-lg shadow-md max-w-sm w-full">
                              <div class="p-4 border-b">
                                <h3 class="text-lg font-medium">Delete Confirmation</h3>
                              </div>
                              
                              <div class="p-4">
                                <p>Are you sure you want to delete this Product?</p>
                              </div>
                              
                              <div class="p-4 bg-gray-50 flex justify-end space-x-3">
                                <button onclick="closeDeleteModal({{ $product->id }})" class="px-4 cursor-pointer py-2 bg-gray-200 rounded text-gray-800 hover:bg-gray-300">
                                  Cancel
                                </button>

                                <form action="{{ route('product.delete', ['id' => $product->id]) }}" method="POST" class="">
                                    @csrf
                                    @method('DELETE')
                                <button class="px-4 py-2 cursor-pointer bg-red-600 rounded text-white hover:bg-red-700">
                                  Delete
                                </button>
                                </form>
                              </div>
                            </div>
                          </div>

                        <!-- Modal Body -->
                        <div id="deleteModal-{{ $product->id }}"
                            class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70">
                            <div class="px-6 py-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-red-100 rounded-full p-2">
                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-medium text-gray-900">Are you sure you want to delete this
                                            product?</h4>
                                        <p class="mt-2 text-sm text-gray-500">
                                            This action cannot be undone. This will permanently delete the product and
                                            remove all
                                            associated data from our servers.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="editModal-{{ $product->id }}"
                            class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70">
                            <div
                                class="bg-white rounded-xl p-6 w-full max-w-md shadow-2xl relative mx-4 animate-fade-in-up">
                                <!-- Close button -->
                                <button onclick="closeModal({{ $product->id }})"
                                    class="absolute top-3 right-3 h-8 w-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="text-gray-600">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>

                                <!-- Header -->
                                <h2 class="text-xl font-bold mb-6 text-gray-800">Edit Product</h2>

                                <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Title field -->
                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Title</label>
                                        <input type="text" name="title" value="{{ $product->title }}"
                                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none transition-all">
                                    </div>

                                    <!-- Description field -->
                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Description</label>
                                        <textarea name="description" rows="3"
                                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none transition-all resize-none">{{ $product->description }}</textarea>
                                    </div>

                                    <!-- Image upload field -->
                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Image</label>
                                        <div class="mt-1 flex items-center">
                                            <label
                                                class="w-full flex items-center justify-center px-4 py-2.5 border border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="text-gray-500 mr-2">
                                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7">
                                                    </path>
                                                    <line x1="16" y1="5" x2="22" y2="5">
                                                    </line>
                                                    <line x1="19" y1="2" x2="19" y2="8">
                                                    </line>
                                                    <circle cx="9" cy="9" r="2"></circle>
                                                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                                                </svg>
                                                <span class="text-sm text-gray-600">Choose file</span>
                                                <input type="file" name="images[]" class="hidden" accept="image/*"
                                                    multiple onchange="previewPhotos(this)">
                                            </label>
                                        </div>

                                        <div id="photo-preview-container" class="grid grid-cols-6 gap-4 mt-4"></div>
                                    </div>


                                    <!-- Form buttons -->
                                    <div class="flex justify-end space-x-3 mt-6">
                                        <button type="button" onclick="closeModal({{ $product->id }})"
                                            class="px-4 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium transition-colors">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="px-4 py-2.5 bg-yellow-400 text-white rounded-lg hover:bg-yellow-600 font-medium transition-colors">
                                            Save Changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback for empty products -->
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500">You haven't listed any products yet.</p>
                        <a href="{{ route('product_list') }}"
                            class="mt-4 inline-block px-6 py-2 bg-amber-400 text-white rounded-full hover:bg-amber-500 transition duration-200">
                            List Your First Product
                        </a>
                    </div>
                @endif
            </div>
            <!-- Pagination -->
            @if ($products->hasPages())
            <div class="flex justify-center mt-8 md:mt-10 px-2">
                <nav class="inline-flex flex-wrap justify-center rounded-md shadow">
                    {{-- Lien Précédent --}}
                    @if ($products->onFirstPage())
                        <span
                            class="py-2 px-2 sm:px-4 border border-gray-300 bg-gray-200 rounded-l-md text-xs sm:text-sm font-medium text-gray-500 cursor-not-allowed flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-3 w-3 sm:h-4 sm:w-4 mr-0 sm:mr-1 inline-block" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            <span class="hidden sm:inline">Previous</span>
                        </span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}"
                            class="py-2 px-2 sm:px-4 border border-gray-300 bg-white rounded-l-md text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-3 w-3 sm:h-4 sm:w-4 mr-0 sm:mr-1 inline-block" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            <span class="hidden sm:inline">Previous</span>
                        </a>
                    @endif

                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        @if ($page == $products->currentPage())
                            <span
                                class="py-2 px-3 sm:px-4 border border-gray-300 text-yellow-400 text-xs sm:text-sm font-medium">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="py-2 px-3 sm:px-4 border border-gray-300 bg-white text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}"
                            class="py-2 px-2 sm:px-4 border border-gray-300 bg-white rounded-r-md text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center">
                            <span class="hidden sm:inline">Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-3 w-3 sm:h-4 sm:w-4 ml-0 sm:ml-1 inline-block" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    @else
                        <span
                            class="py-2 px-2 sm:px-4 border border-gray-300 bg-gray-200 rounded-r-md text-xs sm:text-sm font-medium text-gray-500 cursor-not-allowed flex items-center">
                            <span class="hidden sm:inline">Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-3 w-3 sm:h-4 sm:w-4 ml-0 sm:ml-1 inline-block" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    @endif
                </nav>
            </div>
        @endif
        </div>
    </div>
@endsection
<script>
    function openModal(id) {
        const modal = document.getElementById(`editModal-${id}`);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal(id) {
        const modal = document.getElementById(`editModal-${id}`);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function openDeleteModal(id) {
        const modal = document.getElementById(`deleteModal-${id}`);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal(id) {
        const modal = document.getElementById(`deleteModal-${id}`);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function previewPhotos(input) {
        const previewContainer = input.closest('form').querySelector('#photo-preview-container');
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
