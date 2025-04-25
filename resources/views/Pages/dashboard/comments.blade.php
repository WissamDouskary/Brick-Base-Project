@extends('Pages.dashboard.layouts.app')

@section('content')
    <div class="min-h-screen p-8">

        <h1 class="text-2xl font-bold">Comments</h1>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

            <!-- Top Products Comment -->
            <div class="mb-10">
                <h2 class="text-xl font-bold mb-4">Top Products / Workers Comment</h2>
                <div class="flex justify-center items-center gap-3 mb-7">
                    <button id="workerCom" onclick="toggleTopComments('worker')"
                        class="bg-white border focus:border-gray-500 border-gray-300 shadow-md rounded-full py-3 px-6 select-none cursor-pointer">Workers</button>
                    <button id="productCom" onclick="toggleTopComments('products')"
                        class="bg-white border focus:border-gray-500 border-gray-300 shadow-md rounded-full py-3 px-6 select-none cursor-pointer">Products</button>
                </div>
                @if (count($products) > 0)
                    <div id="productComSection" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Product 1 -->
                        @foreach ($products as $product)
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $product->main_image . '') }}"
                                        alt="{{ $product->title }}" class="w-full h-48 object-cover">
                                    <div
                                        class="absolute top-2 left-2 bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">
                                        {{ $product->category }}
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-bold text-gray-900">{{ $product->title }}</h3>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-sm font-medium text-gray-700">4.5/5</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-600 truncate">
                                        {{ $product->description }}
                                    </p>
                                    <div class="mt-4 flex justify-between items-center">
                                        <div class="flex items-center text-gray-500 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $product->reviews_count }}
                                        </div>
                                        <div class="flex items-center text-gray-500 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            240
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex justify-center">
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
                                terms, or wait for workers adding new products
                            </p>
                        </div>
                    </div>
                @endif

                @if (count($workers) > 0)
                    <div id="workerComSection" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 hidden">
                        <!-- worker -->
                        @foreach ($workers as $worker)
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $worker->profile_photo . '') }}"
                                        alt="{{ $worker->first_name . ' ' . $worker->last_name }}"
                                        class="w-full h-48 object-cover">
                                    <div
                                        class="absolute top-2 left-2 bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">
                                        {{ $worker->category }}
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-bold text-gray-900">
                                                {{ $worker->first_name . ' ' . $worker->last_name }}</h3>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-sm font-medium text-gray-700">4.5/5</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-600 truncate">
                                        {{ $worker->bio }}
                                    </p>
                                    <div class="mt-4 flex justify-between items-center">
                                        <div class="flex items-center text-gray-500 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $worker->reviews_count }}
                                        </div>
                                        <div class="flex items-center text-gray-500 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            240
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex justify-center">
                        <div class="w-full py-12 flex flex-col items-center justify-center text-center">
                            <div class="bg-gray-100 p-6 rounded-full mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">No Workers found!</h3>
                            <p class="text-gray-500 max-w-md mb-6">
                                We couldn't find any Worker matching your criteria. Try adjusting your filters or search
                                terms, or wait for workers adding new Worker
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Recent Comments -->
            <div>
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-xl font-bold">Recent Comments</h2>

                </div>

                <button id="product-toggle" onclick="toggleSection('products')"
                    class="py-2 cursor-pointer border border-gray-300 border-b-gray-50 inline-block px-8 select-none rounded-t-xl">
                    <h2>Product</h2>
                </button>
                <button id="worker-toggle" onclick="toggleSection('workers')"
                    class="py-2 border cursor-pointer border-gray-300 border-b-gray-50 inline-block px-8 select-none rounded-t-xl">
                    <h2>Workers</h2>
                </button>

                {{-- Porducts commands section --}}
                @if (count($productComments) > 0)
                    <div id="product-section" class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Comment
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Creator
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        for
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        action
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($productComments as $comments)
                                    @foreach ($comments->reviews as $reviews)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $reviews->comment }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">
                                                    {{ $reviews->created_at->format('M d, Y') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">{{ $reviews->client->first_name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">{{ $comments->user->first_name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-gray-400 hover:text-gray-500"
                                                    onclick="toggleCommentModal({{ $comments->id }}, {{ $reviews->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="flex justify-center">
                        <div class="w-full py-12 flex flex-col items-center justify-center text-center">
                            <div class="bg-gray-100 p-6 rounded-full mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">No Products Comments found!</h3>
                            <p class="text-gray-500 max-w-md mb-6">
                                We couldn't find any Products Comments matching your criteria. Try adjusting your filters or
                                search
                                terms.
                            </p>
                        </div>
                    </div>
                @endif

                @if (count($workerComments) > 0)
                    {{-- workers commands section --}}
                    <div id="worker-section" class="bg-white shadow overflow-hidden sm:rounded-lg hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Comment
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Creator
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        for
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        action
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($workerComments as $comments)
                                    @foreach ($comments->reviews as $review)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $review->comment }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">
                                                    {{ $review->created_at->format('M d, Y') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">{{ $review->client->first_name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">{{ $comments->first_name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-gray-400 hover:text-gray-500"
                                                    onclick="toggleCommentWorkerModal({{ $comments->id }}, {{ $review->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                @endif

                <!-- Pagination -->
                <div class="mt-5">
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" aria-current="page"
                            class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            1
                        </a>
                        <a href="#"
                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            2
                        </a>
                        <a href="#"
                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            3
                        </a>
                        <span
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                            ...
                        </span>
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>
        </main>
    </div>

    @foreach ($productComments as $comments)
        @foreach ($comments->reviews as $reviews)
            <div id="commentDetailModal-{{ $comments->id }}-{{ $reviews->id }}"
                class="fixed inset-0 bg-black/60 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-lg shadow-xl max-w-lg w-full">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">Comment Details</h3>
                            <button type="button" onclick="toggleCommentModal({{ $comments->id }},{{ $reviews->id }})"
                                class="text-gray-400 hover:text-gray-500">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="mb-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/' . $reviews->client->profile_photo . '') }}"
                                        class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $reviews->client->first_name }}
                                        {{ $reviews->client->last_name }}</p>
                                    <p class="text-xs text-gray-500">{{ $reviews->created_at->format('F d Y') }}</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-sm text-gray-600">
                                    {{ $reviews->comment }}
                                </p>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Product</h4>
                            <div class="flex items-center">
                                <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="{{ asset('storage/' . $comments->main_image . '') }}" alt="KERASET product"
                                        class="h-full w-full object-cover object-center">
                                </div>
                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>{{ $comments->title }}</h3>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500 line-clamp-2">{{ $comments->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 text-right rounded-b-lg">
                        <button type="button"
                            class="px-4 py-2 text-sm font-medium text-red-700 bg-red-100 border border-transparent rounded-md shadow-sm hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-2">
                            Delete Comment
                        </button>
                        <button type="button" onclick="toggleCommentModal({{ $comments->id }}, {{ $reviews->id }})"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach


    @foreach ($workerComments as $comments)
        @foreach ($comments->reviews as $review)
            <div id="commentWorkerModal-{{$comments->id}}-{{$review->id}}"
                class="fixed inset-0 bg-black/60 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-lg shadow-xl max-w-lg w-full">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">Comment Details</h3>
                            <button type="button"
                                onclick="toggleCommentWorkerModal({{ $comments->id }},{{ $review->id }})"
                                class="text-gray-400 hover:text-gray-500">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="mb-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/' . $review->client->profile_photo . '') }}"
                                        class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $review->client->first_name }}
                                        {{ $review->client->last_name }}</p>
                                    <p class="text-xs text-gray-500">{{ $review->created_at->format('F d Y') }}</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-sm text-gray-600">
                                    {{ $review->comment }}
                                </p>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Worker</h4>
                            <div class="flex items-center">
                                <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="{{ asset('storage/' . $comments->profile_photo . '') }}"
                                        alt="KERASET product" class="h-full w-full object-cover object-center">
                                </div>
                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>{{ $comments->first_name }} {{ $comments->last_name }}</h3>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500 line-clamp-2">{{ $comments->bio }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 text-right rounded-b-lg">
                        <button type="button"
                            class="px-4 py-2 text-sm font-medium text-red-700 bg-red-100 border border-transparent rounded-md shadow-sm hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-2">
                            Delete Comment
                        </button>
                        <button type="button"
                            onclick="toggleCommentWorkerModal({{ $comments->id }}, {{ $review->id }})"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach

    <script>
        function toggleCommentModal(commentId, reviewId) {
            const modal = document.getElementById('commentDetailModal-' + commentId + '-' + reviewId);
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
            } else {
                modal.classList.add('hidden');
            }
        }

        function toggleCommentWorkerModal(commentId, reviewId) {
            const modal = document.getElementById('commentWorkerModal-' + commentId + '-' + reviewId);
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
            } else {
                modal.classList.add('hidden');
            }
        }

        let productsSection = document.getElementById('product-section');
        let workersSection = document.getElementById('worker-section');

        let workerbutton = document.getElementById('worker-toggle');
        let productbutton = document.getElementById('product-toggle');

        function toggleSection(section) {
            if (section == 'products' ? !workersSection.classList.contains('hidden') : !productsSection.classList.contains(
                    'hidden')) {
                section == 'products' ? workersSection.classList.add('hidden') : productsSection.classList.add('hidden')
            }

            section == 'products' ? productsSection.classList.remove('hidden') : workersSection.classList.remove('hidden');

            if (section == 'products') {
                workerbutton.classList.remove('border-gray-500');
                workerbutton.classList.add('border-gray-300');
                productbutton.classList.add('border-gray-500');
            } else {
                productbutton.classList.remove('border-gray-500');
                workerbutton.classList.add('border-gray-500');
            }
        }

        let workerComSection = document.getElementById('workerComSection');
        let productComSection = document.getElementById('productComSection');

        function toggleTopComments(section) {
            if (section == 'products' ? !workerComSection.classList.contains('hidden') : !productComSection.classList
                .contains('hidden')) {
                section == 'products' ? workerComSection.classList.add('hidden') : productComSection.classList.add('hidden')
            }

            section == 'products' ? productComSection.classList.remove('hidden') : workerComSection.classList.remove(
                'hidden');
        }
    </script>
@endsection
