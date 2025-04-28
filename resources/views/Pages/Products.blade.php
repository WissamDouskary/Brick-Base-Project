@extends('layouts.app')

@section('title', 'Brick Base - Products')

@section('content')
    <section class="relative h-40 md:h-64 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/photos/Section.png') }}" alt="Construction Background"
                class="w-full h-full object-cover">
        </div>


        <!-- Hero Content -->
        <div class="container mx-auto px-4 h-full flex flex-col justify-center items-start ml-6 relative z-10">
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center">Our Products</h1>
            <p class="text-gray-200 text-sm md:text-base text-center mb-2">Home > Our Products</p>
        </div>
    </section>
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Search and Filter Sidebar -->
            <div class="lg:w-1/4 w-full space-y-6">
                <!-- Search -->
                <form method="GET" action="{{ route('Products') }}" class="space-y-6">
                    <!-- Search -->
                    <div class="bg-[#D9D9D9] rounded-lg shadow p-4">
                        <h3 class="font-medium text-lg mb-4">Search</h3>
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Type To Search"
                                class="w-full border bg-[#FFFFFF] border-gray-300 rounded-lg py-2 px-4 pr-10 outline-none">
                            <button type="submit" class="absolute right-3 top-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="bg-[#D9D9D9] rounded-lg shadow p-4">
                        <h3 class="font-medium text-lg mb-4 font-poppins text-[#121C45]">Filter</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Popularity</label>
                                <select name="sort"
                                    class="w-full border border-gray-300 rounded py-2 px-3 bg-[#FFFFFF] outline-none">
                                    <option value="" selected disabled>Select option</option>
                                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most
                                        Popular</option>
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest
                                    </option>
                                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price:
                                        Low to High</option>
                                    <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                                        Price: High to Low</option>
                                </select>
                            </div>

                            <div> 
                                <label class="block mb-2 text-sm font-medium text-gray-700">Categories</label>
                                <select name="category"
                                    class="w-full border border-gray-300 rounded py-2 px-3 bg-[#FFFFFF] outline-none">
                                    <option value="" selected disabled>Select option</option>
                                    <option value="Residential construction"
                                        {{ request('category') == 'Residential construction' ? 'selected' : '' }}>
                                        Residential construction</option>
                                    <option value="Commercial construction"
                                        {{ request('category') == 'Commercial construction' ? 'selected' : '' }}>Commercial
                                        construction
                                    </option>
                                    <option value="Industrial construction"
                                        {{ request('category') == 'Industrial construction' ? 'selected' : '' }}>
                                        Industrial construction</option>
                                    <option value="Infrastructure construction"
                                        {{ request('category') == 'Infrastructure construction' ? 'selected' : '' }}>
                                        Infrastructure construction</option>
                                    <option value="Non-combustible"
                                        {{ request('category') == 'Non-combustible' ? 'selected' : '' }}>
                                        Non-combustible</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded cursor-pointer">
                            Apply Filters
                        </button>
                    </div>
                </form>
            </div>

            <!-- Products Grid -->
            <div class="lg:w-3/4 w-full">

                @if (count($products) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Product  -->

                        @foreach ($products as $product)
                            <div class="bg-white rounded-lg shadow overflow-hidden h-full flex flex-col">
                                <div class="h-48 w-full">
                                    <img src="{{ asset('storage/' . $product->main_image) }}"
                                        class="w-full h-full object-cover" alt="{{ $product->title }}">
                                </div>
                                <div class="p-4 flex-1 flex flex-col">
                                    <div class="flex items-center justify-between mb-2">
                                        <h3 class="font-bold text-lg">{{ $product->title }}</h3>
                                        <div class="flex items-center">
                                            <span
                                                class="mr-1 text-sm">{{ number_format($product->reviews_avg_rating, 1) }}/5</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-4 truncate flex-1">{{ $product->description }}</p>
                                    <a href="{{ route('ProductPreview', ['id' => $product->id]) }}"
                                        class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                        View Details
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @else
                    <div class="w-full py-12 flex flex-col items-center justify-center text-center">
                        <div class="bg-gray-100 p-6 rounded-full mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">No products found!</h3>
                        <p class="text-gray-500 max-w-md mb-6">
                            We couldn't find any products matching your criteria. Try adjusting your filters or search
                            terms, or
                            wait for workers adding new products
                        </p>
                    </div>
                @endif

                <!-- Pagination -->
                @if ($products->hasPages())
                    <div class="flex justify-center mt-8 md:mt-10 px-2">
                        <nav class="inline-flex flex-wrap justify-center rounded-md shadow">
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
    </div>
@endsection
