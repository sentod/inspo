<footer class="bg-teal-500 shadow-sm py-10 mt-10">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Logo dan sosmed -->
        <div>
            <img src="{{ asset('icons/logo-white.svg') }}" alt="Logo" class="h-8 mb-4">
            <p class="text-white text-sm">Smart solution for digital marketing!</p>
            <div class="flex space-x-3 mt-3">
                <img src="{{ asset('icons/Instagram.svg') }}" class="h-5 w-5" alt="">
                <img src="{{ asset('icons/Google.svg') }}" class="h-5 w-5" alt="">
                <img src="{{ asset('icons/TikTok.svg') }}" class="h-5 w-5" alt="">
                <img src="{{ asset('icons/WhatsApp.svg') }}" class="h-5 w-5" alt="">
            </div>
        </div>

        <!-- Explore -->
        <div>
            <h5 class="text-lg font-semibold text-white mb-3">Explore</h5>
            <ul class="space-y-2 text-sm text-white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Influencers</a></li>
                <li><a href="#">Recommendations</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

        <!-- About -->
        <div>
            <h5 class="text-lg font-semibold text-white mb-3">About</h5>
            <ul class="space-y-2 text-sm text-white">
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Our Story</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </div>

        <!-- Store -->
        <div>
            <h5 class="text-lg font-semibold text-white mb-3">Contact</h5>
            <ul class="space-y-2 text-sm text-white">
                <li><a href="#">+462-830-927</a></li>
                <li><a href="#">Klaten, Jawa Tengah</a></li>
                <li><a href="#">inspo@gmail.com</a></li>
                <li><a href="#">Monday - Friday (09:00 - 17:00)</a></li>
            </ul>
        </div>
    </div>

    <div class="text-center text-sm text-white mt-8">
        © {{ date('Y') }} inspo. All rights reserved.
    </div>
</footer>
