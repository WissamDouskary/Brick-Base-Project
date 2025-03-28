@extends('layouts.app')

@section('title', 'Brick Base - Workers')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex items-center justify-between mb-6">
            <div class="flex space-x-4">
                <select class="border rounded px-2 py-1">
                    <option>reviews</option>
                </select>
                <select class="border rounded px-2 py-1">
                    <option>popularity</option>
                </select>
                <select class="border rounded px-2 py-1">
                    <option>category</option>
                </select>
                <select class="border rounded px-2 py-1">
                    <option>city</option>
                    <option>All</option>
                </select>
            </div>
            <div class="flex">
                <input type="text" placeholder="Search" class="border rounded px-2 py-1 mr-2">
                <button class="bg-blue-500 text-white px-4 py-1 rounded">Search</button>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="relative">
                    <img src="/path/to/worker-image.jpg" alt="Worker" class="w-full h-48 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2">
                        Ceramics and Stone Materials
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold">ADESILEX P9</h3>
                    <div class="flex items-center mb-2">
                        <div class="text-yellow-500">★★★★½</div>
                        <span class="ml-2 text-gray-600">4.5/5</span>
                    </div>
                    <p class="text-gray-600 mb-4">High-performance cementitious adhesive with no vertical slip and extended open time for ceramic tiles and stone materials. The white version has very high white balance and excellent workability.</p>
                    <div class="flex justify-between items-center">
                        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">
                            View Details
                        </a>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            Casablanca
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="relative">
                    <img src="/path/to/worker-image.jpg" alt="Worker" class="w-full h-48 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2">
                        Ceramics and Stone Materials
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold">ADESILEX P9</h3>
                    <div class="flex items-center mb-2">
                        <div class="text-yellow-500">★★★★½</div>
                        <span class="ml-2 text-gray-600">4.5/5</span>
                    </div>
                    <p class="text-gray-600 mb-4">High-performance cementitious adhesive with no vertical slip and extended open time for ceramic tiles and stone materials. The white version has very high white balance and excellent workability.</p>
                    <div class="flex justify-between items-center">
                        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">
                            View Details
                        </a>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            Casablanca
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="relative">
                    <img src="/path/to/worker-image.jpg" alt="Worker" class="w-full h-48 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2">
                        Ceramics and Stone Materials
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold">ADESILEX P9</h3>
                    <div class="flex items-center mb-2">
                        <div class="text-yellow-500">★★★★½</div>
                        <span class="ml-2 text-gray-600">4.5/5</span>
                    </div>
                    <p class="text-gray-600 mb-4">High-performance cementitious adhesive with no vertical slip and extended open time for ceramic tiles and stone materials. The white version has very high white balance and excellent workability.</p>
                    <div class="flex justify-between items-center">
                        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">
                            View Details
                        </a>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            Casablanca
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
