@extends('layouts.app')

@section('title', 'Brick Base - Preview')

@section('content')

    @if ($errors->any())
        <div class="fixed top-4 right-4 bg-red-600 text-white px-5 py-4 rounded-lg shadow-lg z-50">
            <ul class="text-sm list-disc pl-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

    @if (session('error'))
        <div id="successToast"
            class="fixed z-50 top-4 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg hidden opacity-0 transition-opacity duration-300">
            <div class="flex items-center space-x-2">
                <span>{{ session('error') }}</span>
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
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center">
                {{ $worker->first_name . ' ' . $worker->last_name }}</h1>
            <p class="text-gray-200 text-sm md:text-base text-center mb-2">Home > Our Workers >
                {{ $worker->first_name . ' ' . $worker->last_name }}</p>
        </div>
    </section>

    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Product Information Section -->
        <section class="mb-12">
            <div class="text-start mb-2">
                <p class="text-yellow-500 text-sm">{{ $worker->job_title }}</p>
                <h1 class="text-3xl font-bold text-gray-800 mt-1">{{ $worker->first_name . ' ' . $worker->last_name }}</h1>
                <div class="flex items-center gap-2 mt-1">
                    <div>
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < floor($worker->reviews_avg_rating))
                                <span class="text-yellow-500 text-sm"><i class="fas fa-star"></i></span>
                            @elseif ($i - floor($worker->reviews_avg_rating) < 1)
                                <span class="text-yellow-500 text-sm"><i class="fas fa-star-half"></i></span>
                            @else
                                <span class="text-gray-400 text-sm"><i class="fas fa-star"></i></span>
                            @endif
                        @endfor
                    </div>
                    <p class="text-yellow-500 text-sm">({{ $worker->reviews_count }} reviews)</p>
                </div>
            </div>

            <div class="flex flex-col md:flex-row mt-6 gap-8">
                <div class="md:w-1/2">
                    <p class="text-gray-700">
                        {{ $worker->bio }}
                    </p>

                    <div class="mt-8 space-y-4">
                        <div class="border-b border-gray-200 pb-4">
                            <button onclick="toggleSection('productDescription')"
                                class="w-full text-left font-medium py-2 focus:outline-none flex justify-between items-center">
                                Worker Description
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="productDescription" class="mt-2 text-gray-600 text-sm hidden">
                                {{ $worker->bio }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 mb-4">
                        <div class="flex items-center">
                            <span class="text-3xl font-bold text-gray-900">${{ number_format($worker->price, 2) }}</span>
                        </div>
                    </div>
                    <div class="mt-8">
                        <button {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                            class="{{ Auth::user()->role_id == 1 ? 'bg-yellow-200 cursor-not-allowed' : 'bg-yellow-400 cursor-pointer hover:bg-yellow-500' }} text-white font-medium py-3 px-6 rounded-sm transition duration-300"
                            onclick="openModel()">
                            Reserve Now
                        </button>
                    </div>
                    <p class="text-sm text-red-500 mt-3">
                        {{ Auth::user()->role_id == 1 ? "You Can't reserve a worker, You're a Worker" : '' }}</p>
                </div>

                <div class="md:w-1/2 mt-6 md:mt-0">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $worker->profile_photo) }}" alt="Workers applying Keraset"
                            class="w-full h-auto rounded-md shadow-md" />
                        <span class="absolute bottom-3 right-3 bg-yellow-400 text-white text-xs px-2 py-1 rounded-sm">
                            {{ $worker->category }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="mt-10">

                <div class="flex justify-end gap-4">
                    @foreach ($worker->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Thumbnail"
                            class="w-24 h-20 object-cover rounded border border-gray-300 cursor-pointer hover:border-yellow-400" />
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Similar Workers Section -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Similar Workers</h2>

            <div class="relative">

                <div class="flex flex-wrap md:flex-nowrap gap-6 mx-10">

                    @if (count($workers) > 0)

                        @foreach ($workers as $work)
                            <div class="w-full md:w-1/3">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $work->profile_photo) }}"
                                        alt="{{ $work->first_name }}"
                                        class="w-full h-60 object-cover rounded-md shadow-md" />
                                    <span
                                        class="absolute bottom-3 right-3 bg-yellow-400 text-white text-xs px-2 py-1 rounded-sm">
                                        {{ $work->category }}
                                    </span>
                                </div>
                                <h3 class="mt-3 font-bold text-gray-800">{{ $work->first_name }} {{ $work->last_name }}
                                </h3>
                                <p class="text-gray-600 text-sm mt-1 truncate">
                                    {{ $work->bio }}
                                </p>
                                <a href="{{ route('Preview', ['id' => $work->id]) }}"
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
                        <div class="w-full flex justify-center">
                            <div class=" p-8 text-center max-w-xl">
                                <div class="flex justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-700 mb-2">No Workers Available</h3>
                                <p class="text-gray-500 mb-6 max-w-md mx-auto">We couldn't find any workers matching your
                                    criteria. Please try adjusting your search or check back later.</p>
                            </div>
                        </div>
                    @endif
        </section>

        {{-- comment section --}}
        <div class="w-full mx-auto bg-white rounded-lg shadow-md overflow-hidden mt-16" id="commentsSection">
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
                        <input type="hidden" name="worker_id" value="{{ $worker->id }}">
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
                            <button type="submit" {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                                class="px-4 py-1 bg-blue-500 text-white rounded-md text-sm font-medium 
                                {{ Auth::user()->role_id == 1 ? 'cursor-not-allowed opacity-50 bg-blue-300' : 'cursor-pointer' }}">
                                Comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Existing Comment -->
            @if (count($reviews) > 0)

                @foreach ($reviews as $review)
                    <div class="p-4 border-b border-gray-100">
                        <div class="flex space-x-3 items-start">
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
                            @if (Auth::id() === $review->client->id)
                                <div class="flex">
                                    <button onclick="toggleCommentModel({{ $review->id }})"
                                        class=" py-2 rounded-full px-5 cursor-pointer"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <form action="{{ route('review.delete', ['id' => $review->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="py-2 rounded-full px-5 cursor-pointer"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div id="editCommentModal-{{ $review->id }}"
                        class="flex justify-center hidden items-center fixed inset-0 z-50 bg-black/20">
                        <div class="max-w-max mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="px-6 py-4 flex justify-between items-center">
                                <h2 class="text-xl font-bold text-black">Edit Comment</h2>
                                <button onclick="toggleCommentModel({{ $review->id }})"
                                    class="text-xl font-bold cursor-pointer text-black">x</button>
                            </div>
                            <form action="{{ route('review.update', ['id' => $review->id]) }}" method="post"
                                class="my-6 mx-6 flex flex-col gap-4 justify-end items-end w-90">
                                @csrf
                                @method('PUT')

                                <input type="text" name="comment" value="{{ $review->comment }}"
                                    placeholder="Edit Your Comment"
                                    class="py-2 px-5 block w-full border-gray-300 rounded-md shadow-sm outline-none focus:ring-2 focus:ring-yellow-300">
                                <input type="submit" value="Save"
                                    class="py-2 px-5 block w-1/2 text-white border-gray-300 rounded-md shadow-sm bg-yellow-400 outline-none cursor-pointer">
                            </form>
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
        </div>
    </div>

    {{-- Reserve Model --}}
    <div id="reservemodel" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-yellow-500 px-6 py-4 flex justify-between">
                <h2 class="text-xl font-bold text-white">Worker Service</h2>
                <button onclick="closeModel()" class="text-xl font-bold cursor-pointer text-white">x</button>
            </div>

            <form class="p-6 space-y-6" method="POST" action="{{ route('reservation.store') }}">
                @csrf
                @method('POST')

                <input type="hidden" name="worker_id" id="worker_id" value="{{ $worker->id }}">

                <!-- Date Range Selection -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="start-date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="datetime-local" id="start_date" name="start_date"
                                class="pl-10 py-2 block w-full border-gray-300 rounded-md shadow-sm outline-yellow-500"
                                required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="end-date" class="block text-sm font-medium text-gray-700">End Date</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="datetime-local" id="end_date" name="end_date"
                                class="pl-10 py-2 block w-full border-gray-300 rounded-md shadow-sm outline-yellow-500"
                                required>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>

                    <textarea type="text" id="content" name="content"
                        class="pl-2 py-2 block w-full border-gray-300 rounded-md shadow-sm outline-yellow-500" required
                        placeholder="Write what do you need from worker..." rows="4"></textarea>
                </div>

                <!-- Pricing Information -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-700">Worker Price:</span>
                        <div class="text-lg font-bold text-blue-600">${{ number_format($worker->price, 2) }} / day</div>
                        <input type="hidden" name="total_price" value="{{ $worker->price }}">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Final price may vary based on actual days worked</p>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 cursor-pointer hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        Send Demande
                    </button>
                </div>
            </form>
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

        function toggleCommentModel(id) {
            const model = document.getElementById('editCommentModal-' + id);
            if (model.classList.contains('hidden')) {
                model.classList.remove('hidden');
            } else {
                model.classList.add('hidden');
            }
        }

        function openModel() {
            let model = document.getElementById('reservemodel');
            model.classList.remove('hidden');
            model.classList.add('flex')
        }

        function closeModel() {
            let model = document.getElementById('reservemodel');
            model.classList.remove('flex');
            model.classList.add('hidden')
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

        const workerId = document.getElementById('worker_id').value;

        fetch(`/worker/${workerId}/disabled-dates`)
            .then(res => res.json())
            .then(disabledDates => {
                flatpickr("#start_date", {
                    dateFormat: "Y-m-d",
                    disable: disabledDates
                });

                flatpickr("#end_date", {
                    dateFormat: "Y-m-d",
                    disable: disabledDates
                });
            });
    </script>

@endsection
