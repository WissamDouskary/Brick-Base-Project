@extends('layouts.app')

@section('title', 'Brick Base - Preview')

@section('content')

<section class="relative h-40 md:h-64 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('storage/photos/Section.png') }}" alt="Construction Background"
            class="w-full h-full object-cover">
    </div>


    <!-- Hero Content -->
    <div class="container mx-auto px-4 h-full flex flex-col justify-center items-start ml-6 relative z-10">
        <h1 class="text-white text-3xl md:text-5xl font-bold text-center">KERASET</h1>
        <p class="text-gray-200 text-sm md:text-base text-center mb-2">Home > Our Workers > KERASET</p>
    </div>
</section>

<div class="container mx-auto px-4 py-8 max-w-6xl">
    <!-- Product Information Section -->
    <section class="mb-12">
        <div class="text-start mb-2">
            <p class="text-yellow-500 text-sm">Ceramics and Stone Material</p>
            <h1 class="text-3xl font-bold text-gray-800 mt-1">KERASET</h1>
        </div>

        <div class="flex flex-col md:flex-row mt-6 gap-8">
            <div class="md:w-1/2">
                <p class="text-gray-700">
                    Keraset is a grey or white powder composed of cement, sands of selected granulometry, synthetic resins and special admixtures according to a formula developed in MAPEI's Research Laboratories.
                </p>
                
                <div class="mt-8 space-y-4">
                    <div class="border-b border-gray-200 pb-4">
                        <button onclick="toggleSection('productDescription')" class="w-full text-left font-medium py-2 focus:outline-none flex justify-between items-center">
                            Worker Description
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="productDescription" class="mt-2 text-gray-600 text-sm hidden">
                            <p class="mb-2">KERASET is a cementitious adhesive used for interior and exterior installation of ceramic tiles and natural stone materials on floors, walls and ceilings.</p>
                            <p class="mb-2">Features and benefits:</p>
                            <ul class="list-disc pl-5 mb-2">
                                <li>Easy to apply</li>
                                <li>Excellent adhesion to most common substrates</li>
                                <li>No vertical slip, suitable for wall applications</li>
                                <li>Extended open time</li>
                            </ul>
                            <p>Suitable for ceramic tiles of all types on both indoor and outdoor surfaces, including floors, walls, and swimming pools.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8">
                    <button class="bg-yellow-400 hover:bg-yellow-500 text-white font-medium py-3 px-6 rounded-sm transition duration-300">
                        Reserve Now
                    </button>
                </div>
            </div>
            
            <div class="md:w-1/2 mt-6 md:mt-0">
                <div class="relative">
                    <img src="{{ asset('storage/photos/workerphoto.avif') }}" alt="Workers applying Keraset" class="w-full h-auto rounded-md shadow-md"/>
                    <span class="absolute bottom-3 right-3 bg-yellow-400 text-white text-xs px-2 py-1 rounded-sm">
                        Ceramics and Stone Material
                    </span>
                </div>
            </div>
        </div>
        
        <div class="mt-10">
            
            <div class="flex justify-end gap-4">
                <img src="{{ asset('storage/photos/workerphoto.avif') }}" alt="Thumbnail 1" class="w-24 h-20 object-cover rounded border border-gray-300 cursor-pointer hover:border-yellow-400"/>
                <img src="{{ asset('storage/photos/workerphoto.avif') }}" alt="Thumbnail 2" class="w-24 h-20 object-cover rounded border border-gray-300 cursor-pointer hover:border-yellow-400"/>
                <img src="{{ asset('storage/photos/workerphoto.avif') }}" alt="Thumbnail 3" class="w-24 h-20 object-cover rounded border border-gray-300 cursor-pointer hover:border-yellow-400"/>
                <img src="{{ asset('storage/photos/workerphoto.avif') }}" alt="Thumbnail 4" class="w-24 h-20 object-cover rounded border border-gray-300 cursor-pointer hover:border-yellow-400"/>
                <img src="{{ asset('storage/photos/workerphoto.avif') }}" alt="Thumbnail 5" class="w-24 h-20 object-cover rounded border border-gray-300 cursor-pointer hover:border-yellow-400"/>
            </div>
        </div>
    </section>
    
    <!-- Similar Workers Section -->
    <section class="mb-12">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Similar Workers</h2>
        
        <div class="relative">
            
            <div class="flex flex-wrap md:flex-nowrap gap-6 mx-10">
                <!-- Product 1 -->
                <div class="w-full md:w-1/3">
                    <div class="relative">
                        <img src="{{ asset('storage/photos/workerphoto.avif') }}" alt="ISOLASTIC" class="w-full h-auto rounded-md shadow-md"/>
                        <span class="absolute bottom-3 right-3 bg-yellow-400 text-white text-xs px-2 py-1 rounded-sm">
                            Ceramics and Stone Material
                        </span>
                    </div>
                    <h3 class="mt-3 font-bold text-gray-800">ISOLASTIC</h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Flexible latex additive to be mixed with Kerabond, Kerafloor or Adesilex P10.
                    </p>
                </div>
                
                <!-- Product 2 -->
                <div class="w-full md:w-1/3">
                    <div class="relative">
                        <img src="{{ asset('storage/photos/workerphoto.avif') }}" alt="FUGA FRESCA" class="w-full h-auto rounded-md shadow-md"/>
                        <span class="absolute bottom-3 right-3 bg-yellow-400 text-white text-xs px-2 py-1 rounded-sm">
                            Ceramics and Stone Material
                        </span>
                    </div>
                    <h3 class="mt-3 font-bold text-gray-800">FUGA FRESCA</h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Fuga Fresca is a polymer paint for bringing back the original appearance of grout joints.
                    </p>
                </div>
                
                <!-- Product 3 -->
                <div class="w-full md:w-1/3">
                    <div class="relative">
                        <img src="{{ asset('storage/photos/workerphoto.avif') }}" alt="FUGA FRESCA" class="w-full h-auto rounded-md shadow-md"/>
                        <span class="absolute bottom-3 right-3 bg-yellow-400 text-white text-xs px-2 py-1 rounded-sm">
                            Ceramics and Stone Material
                        </span>
                    </div>
                    <h3 class="mt-3 font-bold text-gray-800">FUGA FRESCA</h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Fuga Fresca is a polymer paint for bringing back the original appearance of grout joints.
                    </p>
                </div>
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
            <img src="/api/placeholder/36/36" class="w-9 h-9 rounded-full" alt="Profile avatar" />
            <div class="flex-1 border border-gray-200 rounded-lg shadow-sm">
              <div class="p-3 flex items-center space-x-2">
                <span class="font-medium text-gray-700">John Doe</span>
                <div class="flex text-yellow-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
              </div>
              <div class="px-3 pb-3">
                <textarea placeholder="type your comments..." rows="1" class="w-full outline-none text-gray-600 resize-none"></textarea>
              </div>
              <div class="px-3 py-2 bg-gray-50 border-t border-gray-100 flex justify-end items-center">
                <button class="px-4 py-1 cursor-pointer bg-blue-500 text-white rounded-md text-sm font-medium">Comment</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Existing Comment -->
        <div class="p-4 border-b border-gray-100">
          <div class="flex space-x-3">
            <img src="/api/placeholder/36/36" class="w-9 h-9 rounded-full" alt="Jane Doe avatar" />
            <div class="flex-1">
              <div class="flex items-center mb-1">
                <h3 class="font-medium text-gray-800 mr-2">Jane Doe</h3>
              </div>
              <p class="text-gray-600 mb-2">I really appreciate the insights and perspective shared in this article. It's definitely given me something to think about and has helped me see things from a different angle. Thank you for writing and sharing!</p>
              <div class="flex items-center space-x-4 text-xs text-gray-500">
                <div class="flex items-center space-x-1">
                  <button class="hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                  </button>
                  <button class="hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </button>
                </div>
                <span>5 min ago</span>
              </div>
            </div>
          </div>
        </div>
        
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
</script>

@endsection