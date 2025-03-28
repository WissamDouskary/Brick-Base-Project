@extends('layouts.app')

@section('title', 'Brick Base - About')

@section('content')

    <section class="relative h-40 md:h-64 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/photos/Section.png') }}" alt="Construction Background"
                class="w-full h-full object-cover">
        </div>

        <!-- Hero Content -->
        <div class="container mx-auto px-4 h-full flex flex-col justify-center relative z-10">
            <p class="text-gray-200 text-sm md:text-base text-center mb-2">Affordable Price, Certified Products</p>
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center">Your Partner In Construction!</h1>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-12 md:py-16" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom">
        <div class="container mx-auto px-4 md:px-8 lg:px-16">
            <div class="flex flex-col md:flex-row gap-8 md:gap-12">
                <!-- Text Content -->
                <div class="w-full md:w-1/2">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">About Brick Base Company</h2>

                    <p class="text-gray-600 mb-4 leading-relaxed">
                        At Brick Base, we are committed to building strong foundations for the future. As a leading
                        construction company, we specialize in delivering high-quality, reliable, and innovative
                        construction solutions for residential, commercial, and industrial projects. Our team of experienced
                        professionals is dedicated to bringing your vision to life with precision, craftsmanship, and
                        attention to detail.
                    </p>

                    <ul class="space-y-2 text-gray-600">
                        <li>Roofing Materials and Accessories</li>
                        <li>Flooring Solutions and Underlayments</li>
                        <li>Insulation and Thermal Products</li>
                        <li>Reinforcement Steel and Rebar</li>
                    </ul>
                </div>

                <!-- Building Image with Stats Box -->
                <div class="w-full md:w-1/2 flex flex-col">
                    <div class="rounded-lg">
                        <img src="{{ asset('storage/photos/1.jpg.png') }}" alt="Modern building perspective"
                            class="w-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

        {{-- why choose us section --}}
        <section class="grid grid-cols-2 mb-16 mt-6" data-aos="fade-up"
        data-aos-anchor-placement="top-bottom">
            <div class="h-[550px]">
                <img class="w-full h-full" src="{{ asset('storage/photos/worker.png') }}" alt="helmet photo">
            </div>

            <div class="bg-amber-400 p-16 flex flex-col justify-center">
                <h2 class="text-white text-4xl font-bold mb-4">
                    The Artist<br />
                    Is Always Brick Base!
                </h2>

                <p class="text-white mb-12 text-sm">
                    At Brick Base, we are committed to building strong foundations for the future. As a leading
                    construction company, we specialize in delivering high-quality, reliable, and innovative
                    construction solutions for residential, commercial, and industrial projects. Our team of experienced
                    professionals is dedicated to bringing your vision to life with precision...
                </p>

                {{-- les statistique --}}
                <div class="grid grid-cols-3 gap-8">
                    <div class="text-white">
                        <div class="text-5xl font-bold mb-2">4</div>
                        <div class="text-sm">Consolidated Turnover in 2019</div>
                    </div>

                    <div class="text-white">
                        <div class="text-5xl font-bold mb-2">1,879</div>
                        <div class="text-sm">Employee</div>
                    </div>

                    <div class="text-white">
                        <div class="text-5xl font-bold mb-2">178</div>
                        <div class="text-sm">New formulations by Brick Base every year</div>
                    </div>
                </div>

                <div class="mt-12 text-white text-sm">
                    <p>Whether the job is water proofing, grouting, sealing or any other construction and building needs,</p>
                    <p>The artist is always Brick Base!</p>
                </div>
            </div>
        </section>

            <!-- Partners Section -->
    <section class="py-16 px-8 bg-gray-50 mb-16" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-6 gap-8 items-center">

                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/Mercedes-Benz-Logo.png') }}" alt="Mercedes"
                        class="h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>

                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/Logo-Linkedin.png') }}" alt="linkdin"
                        class="h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>

                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/logo-Bic.png') }}" alt="Bic"
                        class="h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>

                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/IKEA-Logo.png') }}" alt="IKEA-Logo"
                        class="h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>

                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/Lenovo-Logo.jpg') }}" alt="Lenovo-Logo"
                        class="h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>

                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/photos/CAT-logo.png') }}" alt="CAT-logo"
                        class="h-16 object-contain grayscale hover:grayscale-0 transition-all" />
                </div>
            </div>
        </div>
    </section>

    {{-- our Location --}}
    <section class="bg-white mb-16" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom">
        <div class="max-w-6xl mx-auto">

            <div class="bg-[#14213D] p-4">
                <h2 class="text-white text-lg">Our Locations</h2>
            </div>

            <div class="p-6 bg-white">
                <h3 class="text-amber-400 font-medium mb-6">Brick Base Office & Showroom</h3>

                <div class="space-y-3 mb-6">
                    <div class="flex gap-2">
                        <span class="text-sm">• Phone:</span>
                        <span class="text-sm">+218 12-12345</span>
                    </div>
                    <div class="flex gap-2">
                        <span class="text-sm">• Email:</span>
                        <span class="text-sm">douskary.wissam@gmail.com</span>
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
                <div class="w-full h-48">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9147.137252722036!2d2.495153541462481!3d39.524897396161094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1297899778d440bf%3A0xcd98c8f652432f13!2sVillas%20Cala%20del%20Sol%20S.L.!5e1!3m2!1sar!2sma!4v1740332853850!5m2!1sar!2sma"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

@endsection
