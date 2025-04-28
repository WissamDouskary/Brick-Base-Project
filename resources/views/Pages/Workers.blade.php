@extends('layouts.app')

@section('title', 'Brick Base - Workers')

@section('content')
    <section class="relative h-40 md:h-64 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/photos/Section.png') }}" alt="Construction Background"
                class="w-full h-full object-cover">
        </div>

        <!-- Hero Content -->
        <div
            class="container mx-auto px-4 h-full flex flex-col justify-center items-start sm:items-center md:items-start ml-0 sm:ml-0 md:ml-6 relative z-10">
            <h1 class="text-white text-2xl sm:text-3xl md:text-5xl font-bold text-center sm:text-center md:text-left">Our
                Workers</h1>
            <p class="text-gray-200 text-xs sm:text-sm md:text-base text-center sm:text-center md:text-left mb-2">Home > Our
                Workers</p>
        </div>
    </section>

    <div class="container mx-auto px-4 py-6">
        <form action="{{ route('Workers') }}" method="GET" class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-8 w-full mt-6 md:mt-10">
            <div class="flex flex-wrap gap-2 sm:gap-3 w-full md:w-auto">

                <div class="relative w-full sm:w-auto">
                    <select name="sort"
                        class="w-full sm:w-auto bg-white border border-gray-200 text-gray-700 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 pr-10 appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent shadow-sm hover:border-gray-300 transition-colors">
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
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <div class="relative w-full sm:w-auto">
                    <select name="category"
                        class="w-full sm:w-auto bg-white border border-gray-200 text-gray-700 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 pr-10 appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent shadow-sm hover:border-gray-300 transition-colors">
                        <option value="" selected disabled>Select Category</option>
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
                        <option value="Non-combustible" {{ request('category') == 'Non-combustible' ? 'selected' : '' }}>
                            Non-combustible</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <div class="relative w-full sm:w-auto">
                    <select name="city"
                    class="w-full sm:w-auto bg-white border border-gray-200 text-gray-700 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 pr-10 appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent shadow-sm hover:border-gray-300 transition-colors">
                    <option value="" disabled {{ request('city') ? '' : 'selected' }}>Select City</option>
                        <option value="Casablanca" {{ request('city') == 'Casablanca' ? 'selected' : '' }}>Casablanca</option>
                        <option value="Safi" {{ request('city') == 'Safi' ? 'selected' : '' }}>Safi</option>
                        <option value="Agadir" {{ request('city') == 'Agadir' ? 'selected' : '' }}>Agadir</option>
                        <option value="Oujda" {{ request('city') == 'Oujda' ? 'selected' : '' }}>Oujda</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex w-full md:w-auto mt-4 md:mt-0">
                <input type="text" placeholder="Search" name="search" value="{{ request('search') }}"
                    class="w-full md:w-64 border border-gray-200 rounded-l-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                <button type="submit"
                    class="bg-yellow-500 cursor-pointer hover:bg-yellow-600 text-white font-medium px-4 sm:px-6 py-2.5 rounded-r-lg transition-colors focus:outline-none">
                    Apply Filters
                </button>
            </div>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-10 lg:gap-20 mt-8 sm:mt-12 lg:mt-20">
            @if (count($workers) > 0)
                @foreach ($workers as $worker)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $worker->profile_photo) }}" alt="Worker"
                                class="w-full h-60 sm:h-72 object-cover">
                            <div
                                class="absolute bottom-0 left-0 right-0 bg-yellow-500 bg-opacity-50 text-white p-1 max-w-1/2 text-xs sm:text-sm">
                                {{ $worker->category }}
                            </div>
                        </div>
                        <div class="p-3 sm:p-4">
                            <h3 class="text-base sm:text-lg font-bold">{{ $worker->first_name . ' ' . $worker->last_name }}
                            </h3>
                            <div class="flex items-center mb-2">
                                <div class="flex items-center">
                                    <span class="mr-1 text-sm">{{ number_format($worker->reviews_avg_rating, 1) }}/5</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4 text-xs sm:text-sm truncate">{{ $worker->bio }}</p>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('Preview', ['id' => $worker->id]) }}"
                                    class="inline-flex items-center text-blue-600 hover:text-blue-800 text-xs sm:text-sm">
                                    View Details
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 ml-1"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                                <div class="flex items-center text-gray-600 text-xs sm:text-sm">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fillRule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clipRule="evenodd" />
                                    </svg>
                                    {{ $worker->city }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-1 sm:col-span-2 lg:col-span-3">
                    <div class="bg-white shadow-md rounded-lg p-8 text-center">
                        <div class="flex justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-700 mb-2">No Workers Available</h3>
                        <p class="text-gray-500 mb-6 max-w-md mx-auto">We couldn't find any workers matching your criteria.
                            Please try adjusting your search or check back later.</p>
                        <a href="{{ route('Home') }}"
                            class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600">
                            Back to Home
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Pagination -->
    @if ($workers->hasPages())
        <div class="flex justify-center mt-8 md:mt-10 px-2">
            <nav class="inline-flex flex-wrap justify-center rounded-md shadow">
                @if ($workers->onFirstPage())
                    <span
                        class="py-2 px-2 sm:px-4 border border-gray-300 bg-gray-200 rounded-l-md text-xs sm:text-sm font-medium text-gray-500 cursor-not-allowed flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 mr-0 sm:mr-1 inline-block"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span class="hidden sm:inline">Previous</span>
                    </span>
                @else
                    <a href="{{ $workers->previousPageUrl() }}"
                        class="py-2 px-2 sm:px-4 border border-gray-300 bg-white rounded-l-md text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 mr-0 sm:mr-1 inline-block"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span class="hidden sm:inline">Previous</span>
                    </a>
                @endif

                @foreach ($workers->getUrlRange(1, $workers->lastPage()) as $page => $url)
                    @if ($page == $workers->currentPage())
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

                @if ($workers->hasMorePages())
                    <a href="{{ $workers->nextPageUrl() }}"
                        class="py-2 px-2 sm:px-4 border border-gray-300 bg-white rounded-r-md text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center">
                        <span class="hidden sm:inline">Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 ml-0 sm:ml-1 inline-block"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @else
                    <span
                        class="py-2 px-2 sm:px-4 border border-gray-300 bg-gray-200 rounded-r-md text-xs sm:text-sm font-medium text-gray-500 cursor-not-allowed flex items-center">
                        <span class="hidden sm:inline">Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 ml-0 sm:ml-1 inline-block"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                @endif
            </nav>
        </div>
    @endif

    {{-- why choose us section --}}
    <section class="grid grid-cols-1 lg:grid-cols-2 mb-10 md:mb-16 mt-10 md:mt-16" data-aos="fade-up"
        data-aos-anchor-placement="top-bottom">
        <div class="h-[300px] sm:h-[400px] md:h-[500px] lg:h-[550px]">
            <img class="w-full h-full object-cover" src="{{ asset('storage/photos/3workers.png') }}" alt="helmet photo">
        </div>

        <div class="bg-amber-400 p-6 sm:p-10 md:p-16 flex flex-col justify-center">
            <h2 class="text-white text-2xl sm:text-3xl md:text-4xl font-bold mb-4">
                Why chose us<br />
                Workers
            </h2>

            <p class="text-white mb-8 md:mb-12 text-xs sm:text-sm">
                At Brick Base, we are committed to building strong foundations for the future. As a leading
                construction company, we specialize in delivering high-quality, reliable, and innovative
                construction solutions for residential, commercial, and industrial projects. Our team of experienced
                professionals is dedicated to bringing your vision to life with precision...
            </p>

            {{-- les statistique --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8">
                <div class="text-white">
                    <div class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">4</div>
                    <div class="text-xs sm:text-sm">Consolidated Turnover in 2019</div>
                </div>

                <div class="text-white">
                    <div class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">1,879</div>
                    <div class="text-xs sm:text-sm">Employee</div>
                </div>

                <div class="text-white">
                    <div class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">178</div>
                    <div class="text-xs sm:text-sm">New formulations by Brick Base every year</div>
                </div>
            </div>

            <div class="mt-8 md:mt-12 text-white text-xs sm:text-sm">
                <p>Whether the job is water proofing, grouting, sealing or any other construction and building needs,</p>
                <p>The artist is always Brick Base!</p>
            </div>
        </div>
    </section>
@endsection
