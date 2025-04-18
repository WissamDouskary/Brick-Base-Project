@extends('layouts.app')

@section('title', 'Brick Base')

@section('content')
    {{-- first section --}}
    <section class="relative h-screen">
        <div class="absolute inset-0 bg-teal-900 bg-opacity-50">
            <img src="{{ asset('storage/photos/HomeBackground.png') }}" alt="Construction Site"
                class="w-screen h-screen object-cover" />
        </div>

        <div class="relative h-full flex flex-col justify-center px-4 sm:px-8 max-w-6xl mx-auto">
            <div class="text-white">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold font-poppins mb-4">
                    Solid Foundation For A<br class="hidden sm:block" />
                    Brighter Future!
                </h1>
                <p class="text-lg sm:text-xl mb-6 sm:mb-8">Construction structuring</p>
                <div class="flex flex-row w-60 sm:flex-row gap-4">
                    <a href="{{ route('Products')}}" class="w-1/2 sm:w-auto"><button
                            class="w-full sm:w-auto bg-amber-400 text-white px-6 sm:px-10 py-3 hover:bg-amber-500 cursor-pointer duration-200">
                            Products
                        </button></a>
                    <a href="{{ route('About') }}" class="w-1/2 sm:w-auto"><button
                            class="w-full sm:w-auto bg-white text-gray-800 px-6 sm:px-10 py-3 hover:bg-gray-100 cursor-pointer duration-200">
                            About
                        </button></a>
                </div>
            </div>
        </div>
    </section>

    {{-- About home page section --}}
    <section class="py-12 sm:py-16 md:py-20 px-4 sm:px-8" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16">
            <div class="text-gray-700 order-2 md:order-1">
                <p>
                    <span class="text-black font-bold">Brick Base</span>, we are committed to building strong foundations for the future. As a leading
                    construction company, we specialize in delivering high-quality, reliable, and innovative
                    construction solutions for residential, commercial, and industrial projects. Our team of experienced
                    professionals is dedicated to bringing your vision to life with precision, craftsmanship, and
                    attention to detail.
                </p>
            </div>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4 md:mb-6 order-1 md:order-2">About Brick Base Company</h2>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-12 sm:py-16 md:py-20 px-4 sm:px-8 bg-white" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                <div class="bg-white py-8 px-6 sm:px-10 rounded-lg shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="flex justify-center mb-6">
                        <img class="w-16" src="{{ asset('storage/photos/Healthcare.png') }}" alt="Healthcare">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Healthcare</h3>
                </div>

                <div class="bg-white py-8 px-6 sm:px-10 rounded-lg shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="flex justify-center mb-5">
                        <img class="w-16" src="{{ asset('storage/photos/Residential.png') }}" alt="Residential">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Residential</h3>
                </div>

                <div class="bg-white py-8 px-6 sm:px-10 rounded-lg shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="flex justify-center mb-7">
                        <img class="w-16" src="{{ asset('storage/photos/Industrial.png') }}" alt="Industrial">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Industrial</h3>
                </div>

                <div class="bg-white py-8 px-6 sm:px-10 rounded-lg shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="flex justify-center mb-6">
                        <img class="w-16" src="{{ asset('storage/photos/Commercial.png') }}" alt="Commercial">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Commercial</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="py-10 sm:py-16 px-4 sm:px-8 bg-gray-50 mb-10 sm:mb-16" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/Mercedes-Benz-Logo.png') }}" alt="Mercedes"
                        class="h-12 sm:h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>

                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/Logo-Linkedin.png') }}" alt="linkdin"
                        class="h-12 sm:h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>

                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/logo-Bic.png') }}" alt="Bic"
                        class="h-12 sm:h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>

                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/IKEA-Logo.png') }}" alt="IKEA-Logo"
                        class="h-12 sm:h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>

                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/Lenovo-Logo.jpg') }}" alt="Lenovo-Logo"
                        class="h-12 sm:h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>

                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/CAT-logo.png') }}" alt="CAT-logo"
                        class="h-12 sm:h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>
            </div>
        </div>
    </section>

    {{-- why choose us section --}}
    <section class="grid grid-cols-1 lg:grid-cols-2 mb-10 sm:mb-16" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="h-[300px] sm:h-[400px] md:h-[450px] lg:h-[550px]">
            <img class="w-full h-full object-cover" src="{{ asset('storage/photos/helmet.png') }}" alt="helmet photo">
        </div>

        <div class="bg-amber-400 p-6 sm:p-10 md:p-16 flex flex-col justify-center">
            <h2 class="text-white text-2xl sm:text-3xl md:text-4xl font-bold mb-4">
                The Artist<br />
                Is Always Brick Base!
            </h2>

            <p class="text-white mb-8 sm:mb-12 text-sm">
                At Brick Base, we are committed to building strong foundations for the future. As a leading
                construction company, we specialize in delivering high-quality, reliable, and innovative
                construction solutions for residential, commercial, and industrial projects. Our team of experienced
                professionals is dedicated to bringing your vision to life with precision...
            </p>

            {{-- les statistique --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8">
                <div class="text-white">
                    <div class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">4</div>
                    <div class="text-sm">Consolidated Turnover in 2019</div>
                </div>

                <div class="text-white">
                    <div class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">1,879</div>
                    <div class="text-sm">Employee</div>
                </div>

                <div class="text-white">
                    <div class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">178</div>
                    <div class="text-sm">New formulations by Brick Base every year</div>
                </div>
            </div>

            <div class="mt-8 sm:mt-12 text-white text-sm">
                <p>Whether the job is water proofing, grouting, sealing or any other construction and building needs,</p>
                <p>The artist is always Brick Base!</p>
            </div>
        </div>
    </section>

    {{-- our Location --}}
    <section class="bg-white mb-10 sm:mb-16 px-4 sm:px-8" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="max-w-6xl mx-auto">
            <div class="bg-[#14213D] p-4">
                <h2 class="text-white text-lg">Our Locations</h2>
            </div>

            <div class="p-4 sm:p-6 bg-white">
                <h3 class="text-amber-400 font-medium mb-4 sm:mb-6">Brick Base Office & Showroom</h3>

                <div class="space-y-3 mb-6">
                    <div class="flex gap-2">
                        <span class="text-sm">• Phone:</span>
                        <span class="text-sm">+218 12-12345</span>
                    </div>
                    <div class="flex gap-2">
                        <span class="text-sm">• Email:</span>
                        <span class="text-sm break-all">douskary.wissam@gmail.com</span>
                    </div>
                    <div class="flex gap-2">
                        <span class="text-sm">• Address:</span>
                        <span class="text-sm">Tris Highway - New York</span>
                    </div>
                    <div class="flex gap-2">
                        <span class="text-sm">• Hours:</span>
                        <span class="text-sm">Sun-Thu: 8:30am – 16:00pm</span>
                    </div>
                </div>

                <!-- Map -->
                <div class="w-full h-48 sm:h-56 md:h-64">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9147.137252722036!2d2.495153541462481!3d39.524897396161094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1297899778d440bf%3A0xcd98c8f652432f13!2sVillas%20Cala%20del%20Sol%20S.L.!5e1!3m2!1sar!2sma!4v1740332853850!5m2!1sar!2sma"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection