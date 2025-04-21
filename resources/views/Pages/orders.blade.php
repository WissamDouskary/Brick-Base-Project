@extends('layouts.app')

@section('title', 'My Orders')

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

    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        {{-- filter orders --}}
        <div>
            <div class="flex justify-between items-center mb-10">
                <h3 class="text-lg font-medium text-gray-900">My Orders</h3>
                <form method="GET" action="{{ route('orders.list') }}" class="flex flex-wrap items-center gap-4">
                    <select name="status"
                        class="text-sm border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-amber-400">
                        <option value="All">All Orders</option>
                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed
                        </option>
                        <option value="Failed" {{ request('status') == 'Failed' ? 'selected' : '' }}>Failed</option>
                    </select>

                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm">
                        Filter
                    </button>
                </form>
            </div>

            {{-- orders container --}}
            <div id="orders-container" class="flex flex-col gap-4">
                <?php $total = 0;
                $count = 0; ?>
                @if (count($orders) > 0)
                    @foreach ($orders as $order)
                        @if ($order->status === 'Pending')
                            @php $count++ @endphp
                            @php $total += $order->price * $order->quantity; @endphp
                        @endif
                        <div
                            class="bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-200 overflow-hidden">
                            <div class="p-4">
                                <div class="flex items-start">
                                    <div class="mr-4">
                                        <div class="relative">
                                            <img src="{{ asset('storage/' . $order->product->main_image . '') }}"
                                                alt="{{ $order->product->title }}"
                                                class="w-16 h-16 rounded-md object-cover border border-gray-200">
                                            <span
                                                class="absolute -top-1 -right-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 rounded-full 
                                                {{ $order->status === 'Pending'
                                                    ? 'bg-yellow-500'
                                                    : ($order->status === 'Completed'
                                                        ? 'bg-blue-500'
                                                        : ($order->status === 'Failed'
                                                            ? 'bg-red-500'
                                                            : 'bg-gray-400')) }}">
                                                {{ $order->status }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex-1">
                                        <div class="flex justify-between items-start mb-1">
                                            <h4 class="text-gray-900 font-medium">Order #{{ $order->id }}</h4>
                                            <span
                                                class="text-lg font-bold text-amber-500">${{ number_format($order->price * $order->quantity, 2) }}</span>
                                        </div>

                                        <div class="flex items-center mb-1">
                                            <span class="text-sm text-gray-700">{{ $order->product->title }}</span>
                                            <span class="text-xs text-gray-500 ml-2">Qty: {{ $order->quantity }}</span>
                                        </div>

                                        <div class="flex items-center text-xs text-gray-600 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-500 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span>Ordered on {{ date('F j, Y', strtotime($order->created_at)) }}</span>
                                        </div>

                                        <div class="">
                                            @if ($order->status === 'Pending')
                                                <form action="{{ route('order.cancel', ['id' => $order->id]) }}"
                                                    method="POST" class="flex gap-2">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="#"
                                                        onclick="openOrderModal({{ $order->id }}); return false;"
                                                        class="flex-1 cursor-pointer bg-amber-500 text-white text-center py-1.5 rounded text-sm hover:bg-amber-600 transition duration-200">
                                                        Checkout
                                                    </a>

                                                    <button type="submit"
                                                        class="flex-1 cursor-pointer bg-gray-200 text-gray-800 text-center py-1.5 rounded text-sm hover:bg-gray-300 transition duration-200">
                                                        Cancel
                                                    </button>
                                                </form>
                                            @else
                                                <form action="" class="flex gap-2">
                                                    <a href="#"
                                                        onclick="openOrderModal({{ $order->id }}); return false;"
                                                        class="flex-1 cursor-pointer bg-blue-500 text-white text-center py-1.5 rounded text-sm hover:bg-blue-600 transition duration-200">
                                                        View Details
                                                    </a>
                                                    @if ($order->status === 'Completed')
                                                        <button type="button"
                                                            class="flex-1 cursor-pointer bg-green-500 text-white text-center py-1.5 rounded text-sm hover:bg-green-600 transition duration-200">
                                                            Leave Review
                                                        </button>
                                                    @endif
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- orders modal --}}
                        <div id="orderDetailsModal-{{ $order->id }}"
                            class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70">
                            <div
                                class="bg-white rounded-xl p-6 w-full max-w-lg shadow-2xl relative mx-4 animate-fade-in-up max-h-[90vh] overflow-y-auto">

                                <button onclick="closeOrderModal({{ $order->id }})"
                                    class="absolute top-3 right-3 h-8 w-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="text-gray-600">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>

                                <h2 class="text-xl font-bold mb-6 text-gray-800">Order #{{ $order->id }} Details</h2>

                                <div class="space-y-4">
                                    <div class="flex items-center space-x-4 pb-4 border-b">
                                        <img src="{{ asset('storage/' . $order->product->main_image . '') }}"
                                            alt="{{ $order->product->title }}" class="w-16 h-16 rounded-md object-cover">
                                        <div>
                                            <h3 class="font-medium">{{ $order->product->title }}</h3>
                                            <p class="text-sm text-gray-500">Quantity: {{ $order->quantity }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <h3 class="font-medium">Status</h3>
                                        <span
                                            class="px-2 py-1 text-xs font-bold text-white rounded-full
                                            {{ $order->status === 'Pending'
                                                ? 'bg-yellow-500'
                                                : ($order->status === 'Completed'
                                                    ? 'bg-blue-500'
                                                    : ($order->status === 'Failed'
                                                        ? 'bg-red-500'
                                                        : 'bg-gray-400')) }}">
                                            {{ $order->status }}
                                        </span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <h3 class="font-medium">Order Date</h3>
                                        <p>{{ date('F j, Y', strtotime($order->created_at)) }}</p>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <h3 class="font-medium">Unit Price</h3>
                                        <p>${{ number_format($order->price, 2) }}</p>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <h3 class="font-medium">Quantity</h3>
                                        <p>{{ $order->quantity }}</p>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <h3 class="font-medium">Taxes</h3>
                                        <p>$5.99</p>
                                    </div>

                                    <div class="flex items-center justify-between pt-2 border-t">
                                        <h3 class="font-bold">Total</h3>
                                        <p class="font-bold text-amber-500">
                                            ${{ number_format($order->price * $order->quantity + 5.99, 2) }}</p>
                                    </div>

                                    <div class="pt-4 border-t">
                                        <h3 class="font-medium mb-2">Shipping Address</h3>
                                        <p class="text-sm text-gray-600">
                                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<br>
                                            {{ Auth::user()->city }}<br>
                                        </p>
                                    </div>

                                    <div class="pt-4 border-t">
                                        <h3 class="font-medium mb-2">Payment Method</h3>
                                        <div class="flex items-center">
                                            <img class="w-7 text-blue-600 mr-2"
                                                src="{{ asset('storage/photos/paypal.svg') }}" alt="PayPal logo">
                                            <span>PayPal</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                                    <button type="button" onclick="closeOrderModal({{ $order->id }})"
                                        class="px-4 py-2 cursor-pointer bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium transition-colors">
                                        Close
                                    </button>

                                    @if ($order->status === 'Pending')
                                        <form action="{{ route('create.order', ['id' => $order->id]) }}" method="POST">
                                            @csrf

                                            <button type="submit"
                                                class="px-4 py-2 cursor-pointer bg-amber-500 text-white rounded-lg hover:bg-amber-600 font-medium transition-colors">
                                                Complete Checkout
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 text-center">
                        <div class="flex flex-col items-center justify-center py-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mb-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <h3 class="text-lg font-medium text-gray-700 mb-1">No Orders Yet</h3>
                            <p class="text-gray-500 mb-4">You haven't placed any orders yet.</p>
                            <a href="{{ route('Products') }}"
                                class="text-amber-500 hover:text-amber-600 font-medium">Start Shopping</a>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            @if ($orders->hasPages())
                <div class="flex justify-center mt-8 md:mt-10 px-2">
                    <nav class="inline-flex flex-wrap justify-center rounded-md shadow">
                        {{-- Lien Précédent --}}
                        @if ($orders->onFirstPage())
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
                            <a href="{{ $orders->previousPageUrl() }}"
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

                        @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                            @if ($page == $orders->currentPage())
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

                        @if ($orders->hasMorePages())
                            <a href="{{ $orders->nextPageUrl() }}"
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

    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg p-4">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <div class="flex items-center justify-center">
                        <span class="text-sm text-gray-500">Total ({{ $count }} Pending items):</span>
                        <span class="ml-2 font-bold text-lg">${{ $total }}</span>
                    </div>
                </div>
                @if ($count > 0)
                    <form action="{{ route('create.multi.order') }}" method="POST">
                        @csrf
                        <button
                            class="bg-amber-500 cursor-pointer hover:bg-amber-600 text-white px-6 py-2 rounded-md font-medium transition-colors">
                            Checkout All
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection

<script>
    function openOrderModal(id) {
        const modal = document.getElementById(`orderDetailsModal-${id}`);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeOrderModal(id) {
        const modal = document.getElementById(`orderDetailsModal-${id}`);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const toast = document.getElementById('successToast');

        if (toast) {
            toast.classList.remove('hidden');
            setTimeout(function() {
                toast.classList.add('opacity-100');
                setTimeout(function() {
                    toast.classList.remove('opacity-100');
                    setTimeout(function() {
                        toast.classList.add('hidden');
                    }, 300);
                }, 5000);
            }, 100);
        }
    });
</script>
