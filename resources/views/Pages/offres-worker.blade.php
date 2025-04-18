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
                <div class="flex items-center space-x-2">
                    <select id="filter-status" class="text-sm border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-amber-400">
                        <option value="all">All Offers</option>
                        <option value="pending">Pending</option>
                        <option value="accepted">Accepted</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <!-- Pending Offer Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-200 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="mr-4">
                                <div class="relative">
                                    <img src="{{ asset('storage/users/client1.jpg') }}" alt="Client"
                                        class="w-16 h-16 rounded-full object-cover border-2 border-white shadow">
                                    <span class="absolute -top-1 -right-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 rounded-full bg-yellow-500">
                                        Pending
                                    </span>
                                </div>
                                <div class="mt-2 text-center">
                                    <span class="text-xs font-medium">Sarah Johnson</span>
                                </div>
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-1">
                                    <h4 class="text-gray-900 font-medium">Kitchen Renovation Project</h4>
                                    <span class="text-lg font-bold text-amber-500">$450</span>
                                </div>
                                
                                <div class="flex items-center mb-1">
                                    <span class="bg-amber-400 text-white text-xs px-2 py-0.5 rounded">Construction</span>
                                    <span class="text-xs text-gray-500 ml-2">2 hours ago</span>
                                </div>
                                
                                <div class="flex items-center text-xs text-gray-600 mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>Casablanca, Downtown</span>
                                </div>

                                <div class="flex items-center text-xs text-gray-600 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>May 15 - May 20, 2025</span>
                                </div>

                                <p class="text-xs text-gray-600 mb-3 line-clamp-2">Need help with tiling and cabinet installation in my kitchen renovation project. Looking for experienced worker.</p>

                                <div class="flex gap-2">
                                    <form action="" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit"
                                            class="w-full cursor-pointer bg-green-500 text-white text-center py-1.5 rounded text-sm hover:bg-green-600 transition duration-200">
                                            Accept
                                        </button>
                                    </form>
                                    <form action="" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit"
                                            class="w-full cursor-pointer bg-gray-200 text-gray-800 text-center py-1.5 rounded text-sm hover:bg-gray-300 transition duration-200">
                                            Decline
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accepted Offer Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-200 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="mr-4">
                                <div class="relative">
                                    <img src="{{ asset('storage/users/client2.jpg') }}" alt="Client"
                                        class="w-16 h-16 rounded-full object-cover border-2 border-white shadow">
                                    <span class="absolute -top-1 -right-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 rounded-full bg-green-500">
                                        Accepted
                                    </span>
                                </div>
                                <div class="mt-2 text-center">
                                    <span class="text-xs font-medium">Emily Davis</span>
                                </div>
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-1">
                                    <h4 class="text-gray-900 font-medium">Office Renovation</h4>
                                    <span class="text-lg font-bold text-amber-500">$600</span>
                                </div>
                                
                                <div class="flex items-center mb-1">
                                    <span class="bg-amber-400 text-white text-xs px-2 py-0.5 rounded">Renovation</span>
                                    <span class="text-xs text-gray-500 ml-2">1 day ago</span>
                                </div>
                                
                                <div class="flex items-center text-xs text-gray-600 mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>Casablanca, Business District</span>
                                </div>

                                <div class="flex items-center text-xs text-gray-600 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>May 10 - May 14, 2025</span>
                                </div>

                                <p class="text-xs text-gray-600 mb-3 line-clamp-2">Need assistance with drywall installation and painting for office renovation. Professional experience required.</p>

                                <div class="flex gap-2">
                                    <a href="#" onclick="openReservationModal(); return false;"
                                        class="flex-1 cursor-pointer bg-blue-500 text-white text-center py-1.5 rounded text-sm hover:bg-blue-600 transition duration-200">
                                        View Details
                                    </a>
                                    <form action="" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit"
                                            class="w-full cursor-pointer bg-amber-400 text-white text-center py-1.5 rounded text-sm hover:bg-amber-500 transition duration-200">
                                            Mark Complete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Completed Offer Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-200 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="mr-4">
                                <div class="relative">
                                    <img src="{{ asset('storage/users/client3.jpg') }}" alt="Client"
                                        class="w-16 h-16 rounded-full object-cover border-2 border-white shadow">
                                    <span class="absolute -top-1 -right-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 rounded-full bg-blue-500">
                                        Completed
                                    </span>
                                </div>
                                <div class="mt-2 text-center">
                                    <span class="text-xs font-medium">David Wilson</span>
                                </div>
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-1">
                                    <h4 class="text-gray-900 font-medium">Deck Construction</h4>
                                    <span class="text-lg font-bold text-amber-500">$900</span>
                                </div>
                                
                                <div class="flex items-center mb-1">
                                    <span class="bg-amber-400 text-white text-xs px-2 py-0.5 rounded">Construction</span>
                                    <span class="text-xs text-gray-500 ml-2">1 week ago</span>
                                </div>
                                
                                <div class="flex items-center text-xs text-gray-600 mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>Agadir, Beach Area</span>
                                </div>

                                <div class="flex items-center text-xs text-gray-600 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>April 25 - May 1, 2025</span>
                                </div>

                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs text-gray-500">Rating:</span>
                                    <div class="flex text-amber-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                </div>

                                <a href="#" onclick="openReservationModal(); return false;"
                                    class="block w-full cursor-pointer bg-gray-100 text-gray-800 text-center py-1.5 rounded text-sm hover:bg-gray-200 transition duration-200">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-8 md:mt-10 px-2">
                <nav class="inline-flex flex-wrap justify-center rounded-md shadow-sm">
                    <span class="py-2 px-2 sm:px-4 border border-gray-300 bg-gray-200 rounded-l-md text-xs sm:text-sm font-medium text-gray-500 cursor-not-allowed flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-3 w-3 sm:h-4 sm:w-4 mr-0 sm:mr-1 inline-block" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                        <span class="hidden sm:inline">Previous</span>
                    </span>

                    <span class="py-2 px-3 sm:px-4 border border-gray-300 text-yellow-400 text-xs sm:text-sm font-medium">
                        1
                    </span>
                    
                    <a href="#" class="py-2 px-3 sm:px-4 border border-gray-300 bg-white text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50">
                        2
                    </a>

                    <a href="#" class="py-2 px-2 sm:px-4 border border-gray-300 bg-white rounded-r-md text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center">
                        <span class="hidden sm:inline">Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-3 w-3 sm:h-4 sm:w-4 ml-0 sm:ml-1 inline-block" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <!-- Reservation Details Modal -->
    <div id="reservationDetailsModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70">
        <div class="bg-white rounded-xl p-6 w-full max-w-lg shadow-2xl relative mx-4 animate-fade-in-up max-h-[90vh] overflow-y-auto">
            <!-- Close button -->
            <button onclick="closeReservationModal()"
                class="absolute top-3 right-3 h-8 w-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="text-gray-600">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>

            <!-- Header -->
            <h2 class="text-xl font-bold mb-6 text-gray-800">Reservation Details</h2>
            
            <div id="reservationDetailsContent">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="font-medium">Job Title</h3>
                        <p>Kitchen Renovation Project</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-medium">Location</h3>
                        <p>Casablanca, Downtown</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-medium">Dates</h3>
                        <p>May 15, 2025 - May 20, 2025</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-medium">Total Days</h3>
                        <p>5 days</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-medium">Daily Rate</h3>
                        <p>$90</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-medium">Total Payment</h3>
                        <p class="font-bold text-amber-500">$450</p>
                    </div>
                    
                    <div class="pt-4 border-t">
                        <h3 class="font-medium mb-2">Client Information</h3>
                        <div class="flex items-center">
                            <img src="{{ asset('storage/users/client1.jpg') }}" alt="Client" class="w-10 h-10 rounded-full object-cover mr-3">
                            <div>
                                <p class="font-medium">Sarah Johnson</p>
                                <p class="text-sm text-gray-500">sarah.johnson@example.com</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pt-4 border-t">
                        <h3 class="font-medium mb-2">Job Description</h3>
                        <p class="text-sm text-gray-600">
                            Need help with tiling and cabinet installation in my kitchen renovation project. 
                            The work involves installing ceramic tiles on the floor and backsplash, as well as 
                            mounting new cabinets. Experience with kitchen renovations is required.
                        </p>
                    </div>
                    
                    <div class="pt-4 border-t">
                        <h3 class="font-medium mb-2">Special Requirements</h3>
                        <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                            <li>Must bring own tools</li>
                            <li>Experience with tile cutting required</li>
                            <li>Cabinet installation experience preferred</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                    <button type="button" onclick="closeReservationModal()"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium transition-colors">
                        Close
                    </button>
                    <button type="button"
                        class="px-4 py-2 bg-amber-400 text-white rounded-lg hover:bg-amber-500 font-medium transition-colors">
                        Contact Client
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function openReservationModal() {
        const modal = document.getElementById('reservationDetailsModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeReservationModal() {
        const modal = document.getElementById('reservationDetailsModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const toast = document.getElementById('successToast');
        const filterStatus = document.getElementById('filter-status');

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

        if (filterStatus) {
            filterStatus.addEventListener('change', function() {
                window.location.href = `?status=${this.value}`;
            });
        }
    });
</script>