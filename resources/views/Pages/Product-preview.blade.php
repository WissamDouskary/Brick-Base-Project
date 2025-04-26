@extends('layouts.app')

@section('title', 'Brick Base - Preview')

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
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center">{{ $product->title ?? 'title' }}</h1>
            <p class="text-gray-200 text-sm md:text-base text-center mb-2">Home > Products >
                {{ $product->title ?? 'title' }}
            </p>
        </div>
    </section>

    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Product Information Section -->
        <section class="mb-12">
            <div class="text-start mb-2">
                <p class="text-yellow-500 text-sm">{{ $product->category }}</p>
                <h1 class="text-3xl font-bold text-gray-800 mt-1">{{ $product->title }}</h1>
                <div class="flex gap-2 items-center">
                    <div>
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= floor($product->reviews_avg_rating))
                                <span class="text-yellow-400 text-md">★</span>
                            @elseif ($i - $product->reviews_avg_rating < 1)
                                <span class="text-yellow-400 text-md">⯨</span>
                            @else
                                <span class="text-gray-300 text-md">★</span>
                            @endif
                        @endfor
                    </div>
                    <p class="text-yellow-500 text-sm">({{ $product->reviews_count }} reviews)</p>
                </div>
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
                            <div id="productDescription" class="hidden">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Price Section Added Here -->
                    <div class="mt-8 mb-4">
                        <div class="flex items-center">
                            <span class="text-3xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                        </div>

                        @if (isset($product->in_stock) && $product->in_stock)
                            <p class="mt-1 text-sm text-green-600">In Stock</p>
                        @else
                            <p class="mt-1 text-sm text-red-600">Out of Stock</p>
                        @endif
                    </div>

                    <div class="mt-8">
                        <form action="{{ route('product.buy') }}" method="POST" class="flex flex-col items-start gap-6">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">

                            <div>
                                <input name="quantity" type="number" placeholder="Quantity" value="1"
                                    class="border border-yellow-500 rounded-full px-3 py-2 outline-none">
                                @error('quantity')
                                    <p class="text-red-500 ml-2 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="bg-yellow-400 cursor-pointer hover:bg-yellow-500 text-white font-medium py-3 px-6 rounded-sm transition duration-300">
                                Add To Cart
                            </button>
                        </form>
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

            <div class="mt-5">

                <div class="flex justify-end gap-4">
                    @foreach ($product->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="image for {{ $product->title }}"
                            class="w-24 h-20 object-cover rounded border border-gray-300 cursor-pointer hover:border-yellow-400" />
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Similar Products Section -->
        <section class="mb-12 mt-24">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Similar Products</h2>

            <div class="relative">

                <div class="flex flex-wrap md:flex-nowrap gap-6 mx-10">

                    @if (count($products) > 0)
                        @foreach ($products as $prod)
                            <div class="w-full md:w-1/3">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $prod->main_image) }}" alt="{{ $prod->title }}"
                                        class="w-full h-58 object-cover rounded-md" />
                                    <span
                                        class="absolute bottom-3 right-3 bg-yellow-400 text-white text-xs px-2 py-1 rounded-sm">
                                        {{ $prod->category }}
                                    </span>
                                </div>
                                <h3 class="mt-3 font-bold text-gray-800">{{ $prod->title }}</h3>
                                <p class="text-gray-600 text-sm mt-1 truncate">
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">No Similar products found!</h3>
                            <p class="text-gray-500 max-w-md mb-6">
                                We couldn't find any products matching your criteria. Try adjusting your filters or search
                                terms, or wait for workers adding new products
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
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo . '') }}" class="w-9 h-9 rounded-full"
                        alt="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}" />
                    <form action="{{ route('review.store') }}" method="POST"
                        class="flex-1 border border-gray-200 rounded-lg shadow-sm">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="p-3 flex items-center space-x-2">
                            <span
                                class="font-medium text-gray-700">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
                            <div class="flex">
                                <div class="flex flex-row-reverse justify-end space-x-reverse space-x-1"
                                    id="star-container">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" name="rating" id="star{{ $i }}"
                                            value="{{ $i }}" class="hidden peer" />
                                        <label for="star{{ $i }}"
                                            class="text-gray-300 peer-checked:text-yellow-400 hover:text-yellow-400 cursor-pointer text-xl">
                                            ★
                                        </label>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="px-3 pb-3">
                            <textarea name="comment" placeholder="Type your comments..." rows="1"
                                class="w-full outline-none text-gray-600 resize-none"></textarea>
                        </div>
                        <div class="px-3 py-2 bg-gray-50 border-t border-gray-100 flex justify-end items-center">
                            <button type="submit"
                                class="px-4 py-1 cursor-pointer bg-blue-500 text-white rounded-md text-sm font-medium">Comment</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Existing Comment -->
            @if (count($reviews) > 0)

                @foreach ($reviews as $review)
                    <div class="p-4 border-b border-gray-100">
                        <div class="flex space-x-3">
                            <img src="{{ asset('storage/' . $review->client->profile_photo . '') }}"
                                class="w-9 h-9 rounded-full"
                                alt="{{ $review->client->first_name }} {{ $review->client->last_name }}" />
                            <div class="flex-1">
                                <div class="flex items-center mb-1">
                                    <h3 class="font-medium text-gray-800 mr-2">{{ $review->client->first_name }}
                                        {{ $review->client->last_name }}</h3>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span
                                            class="{{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }} text-xl">★</span>
                                    @endfor
                                </div>
                                <p class="text-gray-600 mb-2">{{ $review->comment }}</p>
                                <div class="flex items-center space-x-4 text-xs text-gray-500">
                                    <span>{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="w-full pt-12 flex flex-col items-center justify-center text-center">
                    <h3 class="text-xl font-semibold mb-2">No Comments found!</h3>
                    <p class="text-gray-500 max-w-md mb-6">
                        We couldn't find any reviews for this product, create the first review.
                    </p>
                </div>
            @endif

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
