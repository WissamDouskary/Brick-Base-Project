@extends('layouts.app')

@section('title', 'Brick Base - Preview')

@section('content')

    <section class="relative h-40 md:h-64 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/photos/Section.png') }}" alt="Construction Background"
                class="w-full h-full object-cover">
        </div>


        <!-- Hero Content -->
        <div class="container mx-auto px-4 h-full flex flex-col justify-center items-start ml-6 relative z-10">
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center">{{ $product->title ?? 'title' }}</h1>
            <p class="text-gray-200 text-sm md:text-base text-center mb-2">Home > Products > {{ $product->title ?? 'title' }}
            </p>
        </div>
    </section>

    <div class="container mx-auto px-4 py-8 max-w-6xl">
        @if (!$product || $product->title == null)
            <div class="container mx-auto px-4 py-8 max-w-6xl">
                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md shadow-sm">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <!-- Alert Circle Icon -->
                            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Error</h3>
                            <div class="mt-1 text-sm text-red-700">
                                There is no product with this ID! Please check the product ID and try again.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Product Information Section -->
            <section class="mb-12">
                <div class="text-start mb-2">
                    <p class="text-yellow-500 text-sm">{{ $product->category }}</p>
                    <h1 class="text-3xl font-bold text-gray-800 mt-1">{{ $product->title }}</h1>
                </div>

                <div class="flex flex-col md:flex-row mt-6 gap-8">
                    <div class="md:w-1/2">
                        <p class="text-gray-700">
                            {{ $product->description }}
                        </p>

                        <div class="mt-8 space-y-4">
                            <div class="border-b border-gray-200 pb-4">
                                <button onclick="toggleSection('productDescription')"
                                    class="w-full text-left font-medium py-2 focus:outline-none flex justify-between items-center">
                                    Product Description
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="productDescription">
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <button
                                class="bg-yellow-400 hover:bg-yellow-500 text-white font-medium py-3 px-6 rounded-sm transition duration-300">
                                Buy Now
                            </button>
                        </div>
                    </div>

                    <div class="md:w-1/2 mt-6 md:mt-0">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $product->main_image) }}" alt="Workers applying Keraset"
                                class="w-full h-2/4 rounded-md shadow-md" />
                            <span class="absolute bottom-3 right-3 bg-yellow-400 text-white text-xs px-2 py-1 rounded-sm">
                                {{ $product->category }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="mt-10">

                    <div class="flex justify-end gap-4">
                        @foreach ($product->images as $image)
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Thumbnail 1"
                                class="w-24 h-20 object-cover rounded border border-gray-300 cursor-pointer hover:border-yellow-400" />
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Similar Products Section -->
        <section class="mb-12 mt-24">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Similar Products</h2>

            <div class="relative">

                <div class="flex flex-wrap md:flex-nowrap gap-6 mx-10">
                    
                    @if (count($products) > 0)
                      @foreach ($products as $prod)
                          
                    <div class="w-full md:w-1/3">
                        <div class="relative">
                            <img src="{{ asset('storage/'.$prod->main_image) }}" alt="{{ $prod->title }}"
                                class="w-full h-auto rounded-md shadow-md" />
                            <span class="absolute bottom-3 right-3 bg-yellow-400 text-white text-xs px-2 py-1 rounded-sm">
                                {{ $prod->category }}
                            </span>
                        </div>
                        <h3 class="mt-3 font-bold text-gray-800">{{ $prod->title }}</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            {{ $prod->description }}
                        </p>
                        <a href="{{ route('ProductPreview', ['id' => $prod->id]) }}"
                            class="inline-flex items-center text-blue-600 hover:text-blue-800 text-xs sm:text-sm">
                            View Details
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 ml-1"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                          </a>
                    </div>

                    @endforeach
                    @else
                    <div class="w-full py-12 flex flex-col items-center justify-center text-center">
                        <div class="bg-gray-100 p-6 rounded-full mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">No Similar products found!</h3>
                        <p class="text-gray-500 max-w-md mb-6">
                            We couldn't find any products matching your criteria. Try adjusting your filters or search terms, or wait for workers adding new products
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        {{-- comment section --}}
        <div class="w-full mx-auto bg-white rounded-lg shadow-md overflow-hidden mt-16">
            <div class="p-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Comments</h2>
            </div>

            <!-- Comment Input -->
            <div class="p-4 border-b border-gray-100">
                <div class="flex items-start space-x-3">
                    <img src="/api/placeholder/36/36" class="w-9 h-9 rounded-full" alt="Profile avatar" />
                    <div class="flex-1 border border-gray-200 rounded-lg shadow-sm">
                        <div class="p-3 flex items-center space-x-2">
                            <span class="font-medium text-gray-700">John Doe</span>
                            <div class="flex text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                        </div>
                        <div class="px-3 pb-3">
                            <textarea placeholder="type your comments..." rows="1" class="w-full outline-none text-gray-600 resize-none"></textarea>
                        </div>
                        <div class="px-3 py-2 bg-gray-50 border-t border-gray-100 flex justify-end items-center">
                            <button
                                class="px-4 py-1 cursor-pointer bg-blue-500 text-white rounded-md text-sm font-medium">Comment</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Existing Comment -->
            <div class="p-4 border-b border-gray-100">
                <div class="flex space-x-3">
                    <img src="/api/placeholder/36/36" class="w-9 h-9 rounded-full" alt="Jane Doe avatar" />
                    <div class="flex-1">
                        <div class="flex items-center mb-1">
                            <h3 class="font-medium text-gray-800 mr-2">Jane Doe</h3>
                        </div>
                        <p class="text-gray-600 mb-2">I really appreciate the insights and perspective shared in this
                            article. It's definitely given me something to think about and has helped me see things from a
                            different angle. Thank you for writing and sharing!</p>
                        <div class="flex items-center space-x-4 text-xs text-gray-500">
                            <div class="flex items-center space-x-1">
                                <button class="hover:text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7" />
                                    </svg>
                                </button>
                                <button class="hover:text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <span>5 min ago</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="p-3">
                <button class="w-full py-2 bg-gray-100 hover:bg-gray-200 text-gray-600 text-sm font-medium rounded">
                    Load More
                </button>
            </div>
        </div>
    </div>

    <script>
        function toggleSection(id) {
            const section = document.getElementById(id);
            if (section.classList.contains('hidden')) {
                section.classList.remove('hidden');
            } else {
                section.classList.add('hidden');
            }
        }
    </script>

@endsection
