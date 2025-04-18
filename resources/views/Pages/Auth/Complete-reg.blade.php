@extends('layouts.app')

@section('title', 'Complete Your Registration')

@section('content')
<div class="flex min-h-screen flex-col md:flex-row">
    <!-- Left side - Orange background with text -->
    <div class="bg-amber-400 p-8 md:w-1/2 flex flex-col justify-center">
        <div class="md:ml-8">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Complete Your registration</h1>
            <p class="text-xl md:text-2xl text-white">
                Join us in our World!
            </p>
        </div>
    </div>

    <!-- Right side - Profile completion form -->
    <div class="bg-white p-8 md:w-1/2 flex items-center justify-center">
        <div class="w-full max-w-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Hello Worker!</h2>
            <p class="text-gray-600 mb-6">Please fill all required Data to complete your registration as a Worker!</p>
            
            <form method="POST" action="{{ route('completeRegistration') }}">
                @csrf
                
                <!-- Bio field -->
                <div class="mb-4">
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">
                        Description
                    </label>
                    <textarea
                        id="bio"
                        name="bio"
                        rows="4"
                        placeholder="Describe Your Self!"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400 @error('bio') border-red-500 @enderror"
                        required
                    >{{ old('bio') }}</textarea>
                    @error('bio')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Job title field -->
                <div class="mb-6">
                    <label for="job_title" class="block text-sm font-medium text-gray-700 mb-1">
                        Job title
                    </label>
                    <input
                        type="text"
                        id="job_title"
                        name="job_title"
                        value="{{ old('job_title') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400 @error('job_title') border-red-500 @enderror"
                        required
                    >
                    @error('job_title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- category field -->
                <div class="mb-6">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
                        Category
                    </label>
                    <select
                    type="text"
                        id="category"
                        name="category"
                        value="{{ old('category') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400 @error('category') border-red-500 @enderror"
                    required
                    >
                        <option value="" disabled selected>Select Your Categorie</option>
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

                <div class="mb-6">
                    <label for="job_title" class="block text-sm font-medium text-gray-700 mb-1">
                        Price per Day
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
                    @error('job_title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Complete button -->
                <div class="flex justify-start">
                    <button
                        type="submit"
                        class="bg-black text-white px-8 py-2 rounded-full hover:bg-gray-800 transition-colors"
                    >
                        Complete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection