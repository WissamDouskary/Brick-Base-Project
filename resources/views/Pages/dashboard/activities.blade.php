@extends('Pages.dashboard.layouts.app')

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

    <div class="min-h-screen">
        <div class="ml-8 mt-8">
            <h1 class="text-2xl font-bold">Products</h1>
        </div>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

            <!-- Product Stats -->
            <div class="grid grid-cols-3 gap-4 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Available Products</h3>
                    <p class="text-3xl font-bold">{{ $countallProducts }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Active Products</h3>
                    <p class="text-3xl font-bold">{{ $countacceptedProducts }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Declined products</h3>
                    <p class="text-3xl font-bold">{{ $countdeclinedProducts }}</p>
                </div>
            </div>

            <!-- Pending Products -->
            <div class="mb-10">

                <h2 class="text-xl font-bold mb-4">Pending</h2>

                @if (count($pendingProducts) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($pendingProducts as $product)
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $product->main_image . '') }}" alt="KERASET product"
                                        class="w-full h-48 object-cover">
                                    <div
                                        class="absolute top-2 left-2 bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">
                                        Waiting for your approval
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-bold text-gray-900">{{ $product->title }}</h3>
                                            <p class="text-sm text-gray-500">
                                                from {{ $product->user->first_name . ' ' . $product->user->last_name }}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                                        {{ $product->description }}
                                    </p>
                                    <div class="mt-4 flex space-x-2 items-center justify-between">
                                        <div class="flex gap-2">
                                            <form
                                                action="{{ route('dashboard.manageProduct', ['id' => $product->id, 'status' => 'Accepted']) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="cursor-pointer px-4 py-2 bg-green-600 text-white text-sm font-medium rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                    Accept
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('dashboard.manageProduct', ['id' => $product->id, 'status' => 'Declined']) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="cursor-pointer px-4 py-2 bg-red-600 text-white text-sm font-medium rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                    Decline
                                                </button>
                                            </form>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-yellow-500">${{ $product->price }}</h3>
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
                            <h3 class="text-xl font-semibold mb-2">No Pending products found!</h3>
                            <p class="text-gray-500 max-w-md mb-6">
                                We couldn't find any products matching your criteria. Try adjusting your filters or search
                                terms, or wait for workers adding new products
                            </p>
                        </div>
                    </div>
                @endif

                @if ($amount < $countpendingProducts)
                    <form method="GET" action="{{ route('dashboard.activities') }}" class="flex justify-center mt-6">
                        <input type="hidden" name="amount" value="{{ $amount + 3 }}">
                        <button
                            class="px-4 cursor-pointer py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Load More
                        </button>
                    </form>
                @endif
            </div>

            <!-- Accepted Products -->
            <div>
                <h2 class="text-xl font-bold mb-4">Accepted</h2>

                @if (count($acceptedProducts) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($acceptedProducts as $product)
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $product->main_image . '') }}" alt="KERASET product"
                                        class="w-full h-48 object-cover">
                                    <div
                                        class="absolute top-2 left-2 bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">
                                        Accepted and listed product
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-bold text-gray-900">{{ $product->title }}</h3>
                                            <p class="text-sm text-gray-500">from
                                                {{ $product->user->first_name . ' ' . $product->user->last_name }}</p>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-sm font-medium text-gray-700">{{ number_format($product->reviews_avg_rating, 1) }}/5</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                                        {{ $product->description }}
                                    </p>
                                    <div class="flex items-center justify-between mt-4">
                                        <div class="flex items-center text-gray-500 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                            {{ $product->orders_count }}
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-yellow-500">${{ $product->price }}</h3>
                                        </div>
                                    </div>
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
                        <h3 class="text-xl font-semibold mb-2">No Accepted products found!</h3>
                        <p class="text-gray-500 max-w-md mb-6">
                            We couldn't find any products matching your criteria. Try adjusting your filters or search
                            terms, or wait for workers adding new products
                        </p>
                    </div>
                @endif

            </div>

            @if ($amountAccepted < $countacceptedProducts)
                <form method="GET" action="{{ route('dashboard.activities') }}" class="flex justify-center mt-6">
                    <input type="hidden" name="amountaccepted" value="{{ $amountAccepted + 3 }}">
                    <button
                        class="px-4 cursor-pointer py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Load More
                    </button>
                </form>
            @endif
        </main>
    </div>

    <script>
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
