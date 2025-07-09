<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspo.</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body class="bg-gray-100">
    <nav class="p-4 bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">
           <img src="{{ asset('icons/logo.svg') }}" alt="Inspo Logo" class="mx-2 my-0">
            <div>
                <a href="{{ route('account.home') }}" class="{{ Request::routeIs('account.home') ? 'text-teal-500' : 'text-gray-500' }} hover:text-teal-500 transition-colors duration-200 mr-2">Home</a>
                <a href="{{ route('account.recommendations') }}" class="{{ Request::routeIs('account.recommendations') ? 'text-teal-500' : 'text-gray-500' }} hover:text-teal-500 transition-colors duration-200 mr-2">Recommendations</a>
                <a href="{{ route('account.influencers') }}" class="{{ Request::routeIs('account.influencers') ? 'text-teal-500' : 'text-gray-500' }} hover:text-teal-500 transition-colors duration-200 mr-2">Influencers</a>
                <a href="{{ route('account.contact') }}" class="{{ Request::routeIs('account.contact') ? 'text-teal-500' : 'text-gray-500' }} hover:text-teal-500 transition-colors duration-200 mr-2">Contact Us</a>
            </div>
            @if(Auth::check())
                <div class="relative">
                    <button id="dropdownButton" class="text-2l flex items-center text-gray-700 mr-2">
                        Hello,  <p class="font-medium ml-1">{{ Auth::user()->name }}</p>
                         <img src="{{ asset('icons/arrow.svg') }}" alt="Inspo Logo" class="mr-4">
                    </button>
                    <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-md rounded-md hidden">
                        <a href="{{ route('account.logout') }}" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                    </div>
                </div>
                <script>
                    document.getElementById('dropdownButton').addEventListener('click', function(event) {
                        event.stopPropagation();
                        document.getElementById('dropdown').classList.toggle('hidden');
                    });

                    document.addEventListener('click', function(event) {
                        let dropdown = document.getElementById('dropdown');
                        if (!dropdown.contains(event.target) && !document.getElementById('dropdownButton').contains(event.target)) {
                            dropdown.classList.add('hidden');
                        }
                    });
                </script>
            @endif
        </div>
    </nav>

@yield('content')
@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
@yield('scripts')

</body>
<script>
    const swiper = new Swiper('.swiper', {
        loop: true,
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

</html>
