@extends('layouts.app')

@section('title', 'Brick Base - Contact us')

@section('content')
<section class="container mx-auto px-4 py-12 max-w-3xl">
    <div class="text-center mb-10">
        <h4 class="text-yellow-500 font-medium mb-2">Our Locations</h4>
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Contact Us</h2>
        <p class="text-gray-600 max-w-lg mx-auto">
            We understand the importance of approaching each work integrally and believe in the power of simple and easy communication.
        </p>
    </div>

    <form class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <input type="text" placeholder="Name" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <input type="email" placeholder="Email" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <input type="number" placeholder="Phone" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <input type="text" placeholder="Company" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        
        <div>
            <textarea placeholder="Request Details" rows="4" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        
        <div>
            <button type="submit" class="w-full bg-blue-900 text-white py-3 px-4 rounded transition-colors duration-300">
                Submit Request
            </button>
        </div>
    </form>
</section>

<section class="bg-white mb-16 mt-16" data-aos="fade-up"
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