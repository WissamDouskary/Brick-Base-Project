@extends('layouts.app')

@section('title', 'Brick Base - List Product')

@section('content')
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

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">
                Title <span class="text-red-500">*</span>
            </label>
            <div class="mt-1">
                <input type="text" name="title" id="title" placeholder="Enter Your Product Title" 
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
                <textarea id="description" name="description" rows="5" 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400"
                    required></textarea>
            </div>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">
                Image <span class="text-red-500">*</span>
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div class="flex text-sm text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-amber-600 hover:text-amber-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-amber-500">
                            <span>Upload your product image</span>
                            <input id="file-upload" name="image" type="file" class="sr-only" accept="image/*" required>
                        </label>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                </div>
            </div>
            @error('image')
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

        <div class="flex justify-end">
            <button type="submit" 
                class="cursor-pointer inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-full text-white bg-amber-400 hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition duration-200">
                List !
            </button>
        </div>
    </form>
</div>
@endsection

