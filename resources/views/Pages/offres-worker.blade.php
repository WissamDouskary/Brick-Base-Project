@extends('layouts.app')

@section('title', 'Brick Base - Reservation Offers')

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

        <!-- Offers Section -->
        <div>
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-medium text-gray-900">Available Offers</h3>
                <form method="GET" action="{{ route('offers') }}" class="mb-4 flex flex-wrap items-center gap-4">
                    <select name="status" class="text-sm border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-amber-400">
                        <option value="All">All Offers</option>
                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Accepted" {{ request('status') == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Failed" {{ request('status') == 'Failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm">
                        Filter
                    </button>
                </form>
            </div>

            <div id="offers-container" class="flex flex-col gap-4">
                <!-- Pending Offer Card -->
                @if (count($offers) > 0)

                    @foreach ($offers as $offer)
                        <div
                            class="bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-200 overflow-hidden">
                            <div class="p-4">
                                <div class="flex items-start">
                                    <div class="mr-4">
                                        <div class="relative">
                                            <img src="{{ asset('storage/' . $offer->profile_photo . '') }}"
                                                alt="{{ $offer->first_name }} {{ $offer->last_name }}"
                                                class="w-16 h-16 rounded-full object-cover border-2 border-white shadow">
                                            <span
                                                class="absolute -top-1 -right-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 rounded-full 
                                                {{ $offer->status === 'Pending' ? 'bg-yellow-500' : ($offer->status === 'Accepted' ? 'bg-green-500' : ($offer->status === 'Completed' ? 'bg-blue-500' : ($offer->status === 'Failed' ? 'bg-red-500' : 'bg-gray-400'))) }}">
                                                {{ $offer->status }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex-1">
                                        <div class="flex justify-between items-start mb-1">
                                            <h4 class="text-gray-900 font-medium">{{ $offer->first_name }}
                                                {{ $offer->last_name }}</h4>
                                            <span
                                                class="text-lg font-bold text-amber-500">${{ $offer->price *
                                                    (\Carbon\Carbon::parse($offer->start_date)->diffInDays(\Carbon\Carbon::parse($offer->end_date)) + 1) }}</span>
                                        </div>

                                        <div class="flex items-center mb-1">
                                            <span
                                                class="text-xs text-gray-500 ml-2">{{ \Carbon\Carbon::parse($offer->created_at)->diffForHumans() }}</span>
                                        </div>

                                        <div class="flex items-center text-xs text-gray-600 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-500 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span>{{ $offer->city }}</span>
                                        </div>

                                        <div class="flex items-center text-xs text-gray-600 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-500 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span>{{ \Carbon\Carbon::parse($offer->start_date)->format('F j') }} -
                                                {{ \Carbon\Carbon::parse($offer->end_date)->format('F j, Y') }}</span>
                                        </div>

                                        <p class="text-xs text-gray-600 mb-3 line-clamp-2">{{ $offer->content }}</p>
                                        @if ($offer->status == 'Pending')
                                            <div class="flex gap-2">
                                                <form
                                                    action="{{ route('offer.manage', ['id' => $offer->id, 'status' => 'Accepted']) }}"
                                                    method="POST" class="flex-1">
                                                    @csrf

                                                    <button type="submit"
                                                        class="w-full cursor-pointer bg-green-500 text-white text-center py-1.5 rounded text-sm hover:bg-green-600 transition duration-200">
                                                        Accept
                                                    </button>
                                                </form>
                                                <form
                                                    action="{{ route('offer.manage', ['id' => $offer->id, 'status' => 'Failed']) }}"
                                                    method="POST" class="flex-1">
                                                    @csrf
                                                    <button type="submit"
                                                        class="w-full cursor-pointer bg-gray-200 text-gray-800 text-center py-1.5 rounded text-sm hover:bg-gray-300 transition duration-200">
                                                        Decline
                                                    </button>
                                                </form>
                                            </div>
                                        @elseif ($offer->status == 'Accepted')
                                            <div class="flex gap-2">
                                                <a href="#"
                                                    onclick="openReservationModal({{ $offer->id }}); return false;"
                                                    class="flex-1 cursor-pointer bg-blue-500 text-white text-center py-1.5 rounded text-sm hover:bg-blue-600 transition duration-200">
                                                    View Details
                                                </a>
                                                <form
                                                    action="{{ route('offer.manage', ['id' => $offer->id, 'status' => 'Completed']) }}"
                                                    method="POST" class="flex-1">
                                                    @csrf
                                                    <button type="submit"
                                                        class="w-full cursor-pointer bg-amber-400 text-white text-center py-1.5 rounded text-sm hover:bg-amber-500 transition duration-200">
                                                        Mark Complete
                                                    </button>
                                                </form>
                                            </div>
                                        @elseif ($offer->status == 'Completed')
                                            <a href="#"
                                                onclick="openReservationModal({{ $offer->id }}); return false;"
                                                class="block w-full cursor-pointer bg-gray-100 text-gray-800 text-center py-1.5 rounded text-sm hover:bg-gray-200 transition duration-200">
                                                View Details
                                            </a>
                                        @elseif ($offer->status = 'Failed')
                                            <a href="#"
                                                onclick="openReservationModal({{ $offer->id }}); return false;"
                                                class="block w-full cursor-pointer bg-gray-100 text-gray-800 text-center py-1.5 rounded text-sm hover:bg-gray-200 transition duration-200">
                                                View Details
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Reservation Details Modal -->
                        <div id="reservationDetailsModal-{{ $offer->id }}"
                            class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70">
                            <div
                                class="bg-white rounded-xl p-6 w-full max-w-lg shadow-2xl relative mx-4 animate-fade-in-up max-h-[90vh] overflow-y-auto">
                                <!-- Close button -->
                                <button onclick="closeReservationModal({{ $offer->id }})"
                                    class="absolute top-3 right-3 h-8 w-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="text-gray-600">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>

                                <!-- Header -->
                                <h2 class="text-xl font-bold mb-6 text-gray-800">Reservation Details</h2>

                                <div id="reservationDetailsContent-{{ $offer->id }}">
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="font-medium">Location</h3>
                                            <p>{{ $offer->city }}</p>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <h3 class="font-medium">Dates</h3>
                                            <p>{{ \Carbon\Carbon::parse($offer->start_date)->format('F j') }} -
                                                {{ \Carbon\Carbon::parse($offer->end_date)->format('F j, Y') }}</p>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <h3 class="font-medium">Total Days</h3>
                                            <p>
                                                {{ \Carbon\Carbon::parse($offer->start_date)->diffInDays(\Carbon\Carbon::parse($offer->end_date)) + 1 }}
                                                days
                                            </p>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <h3 class="font-medium">Daily Rate</h3>
                                            <p>${{ Auth::user()->price }}</p>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <h3 class="font-medium">Total Payment</h3>
                                            <p class="font-bold text-amber-500">
                                                ${{ $offer->price *
                                                    (\Carbon\Carbon::parse($offer->start_date)->diffInDays(\Carbon\Carbon::parse($offer->end_date)) + 1) }}
                                            </p>
                                        </div>

                                        <div class="pt-4 border-t">
                                            <h3 class="font-medium mb-2">Client Information</h3>
                                            <div class="flex items-center">
                                                <img src="{{ asset('storage/' . $offer->profile_photo . '') }}"
                                                    alt="Client" class="w-10 h-10 rounded-full object-cover mr-3">
                                                <div>
                                                    <p class="font-medium">
                                                        {{ $offer->first_name . ' ' . $offer->last_name }}</p>
                                                    <p class="text-sm text-gray-500">{{ $offer->email }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-4 border-t">
                                            <h3 class="font-medium mb-2">Job Description</h3>
                                            <p class="text-sm text-gray-600">
                                                {{ $offer->content }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                                        <button type="button" onclick="closeReservationModal({{ $offer->id }})"
                                            class="px-4 py-2 cursor-pointer bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium transition-colors">
                                            Close
                                        </button>
                                    </div>
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
                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-lg font-medium text-gray-700 mb-1">No Offers Yet</h3>
                            <p class="text-gray-500 mb-4">You don't have any offers at the moment.</p>
                            <p class="text-sm text-gray-400">Check back later or update your profile to attract more
                                clients.</p>
                        </div>
                    </div>
                @endif

            </div>

            <!-- Pagination -->
            @if ($offers->hasPages())
                <div class="flex justify-center mt-8 md:mt-10 px-2">
                    <nav class="inline-flex flex-wrap justify-center rounded-md shadow">
                        @if ($offers->onFirstPage())
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
                            <a href="{{ $offers->previousPageUrl() }}"
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

                        @foreach ($offers->getUrlRange(1, $offers->lastPage()) as $page => $url)
                            @if ($page == $offers->currentPage())
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

                        @if ($offers->hasMorePages())
                            <a href="{{ $offers->nextPageUrl() }}"
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

@endsection

<script>
    function openReservationModal(id) {
        const modal = document.getElementById(`reservationDetailsModal-${id}`);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeReservationModal(id) {
        const modal = document.getElementById(`reservationDetailsModal-${id}`);
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
