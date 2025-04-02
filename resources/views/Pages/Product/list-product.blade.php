@extends('layouts.app')

@section('title', 'Brick Base - List Product')

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

    <section class="relative h-40 md:h-64 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/photos/Section.png') }}" alt="Construction Background"
                class="w-full h-full object-cover">
        </div>


        <!-- Hero Content -->
        <div class="container mx-auto px-4 h-full flex flex-col justify-center items-start ml-6 relative z-10">
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center">List Product</h1>
            <p class="text-gray-200 text-sm md:text-base text-center mb-2">Home > Products > List Products</p>
        </div>
    </section>
    <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">List Your Product</h1>
            <p class="mt-2 text-sm text-gray-600">Fill in the details below to list your product on Brick Base.</p>
        </div>

        <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('POST')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">
                    Title <span class="text-red-500">*</span>
                </label>
                <div class="mt-1">
                    <input type="text" name="title" id="title" placeholder="Enter Your Product Title"
                        value="{{ old('title') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400"
                        required>
                </div>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">
                    Description <span class="text-red-500">*</span>
                </label>
                <div class="mt-1">
                    <textarea id="description" name="description" rows="5" value="{{ old('description') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400" required></textarea>
                </div>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-3 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mb-1 text-sm text-gray-500">Click to upload photos</p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF (MAX. 6 photos)</p>
                            </div>
                            <input id="photos" name="photos[]" type="file" class="hidden" multiple accept="image/*"
                                onchange="previewPhotos(this)" />
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

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">
                    Price <span class="text-red-500">*</span>
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">$</span>
                    </div>
                    <input type="text" name="price" id="price" placeholder="Enter Price"
                        value="{{ old('price') }}"
                        class="block w-full pl-7 pr-12 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400"
                        required>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">USD</span>
                    </div>
                </div>
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- category field -->
            <div class="mb-6">
                <label for="category" class="block text-sm font-medium text-gray-700">
                    Category <span class="text-red-500">*</span>
                </label>
                <select
                type="text"
                    id="category"
                    name="category"
                    value="{{ old('category') }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400 pr-2"
                required
                >
                    <option value="" class="block text-sm font-medium text-gray-500 mb-1" disabled selected>Select Your Categorie</option>
                    <option value="Residential construction" >Residential construction</option>
                    <option value="Commercial construction">Commercial construction</option>
                    <option value="Industrial construction">Industrial construction</option>
                    <option value="Infrastructure construction">Infrastructure construction</option>
                    <option value="Non-combustible">Non-combustible</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="cursor-pointer inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-full text-white bg-amber-400 hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition duration-200">
                    List !
                </button>
            </div>
        </form>
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
