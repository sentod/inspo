@extends('layouts.app')

@section('content')
  <main class="flex flex-col md:flex-row items-center justify-between p-8 md:p-16">
    <!-- Left Side Text -->
    <div class="md:w-1/2 space-y-4 md:mr-8">
        <h1 class="text-4xl md:text-4xl font-bold text-gray-700">
            Find influencers according to your needs
        </h1>
        <p class="text-gray-500">
            Recommend Instagram influencers according to the needs of your brand or company
        </p>
    </div>

   <!-- Right Side Carousel -->
    <div class="md:w-1/2 mt-10 md:mt-0">
    <div class="relative swiper w-full h-80 rounded-lg shadow overflow-hidden">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('images/header 1.jpg') }}" alt="Slide 1" class="w-full h-auto max-h-[500px] object-cover" />
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/header 2.jpg') }}" alt="Slide 2" class="w-full h-auto max-h-[500px] object-cover" />
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/header 3.jpg') }}" alt="Slide 3" class="w-full h-auto max-h-[500px] object-cover" />
            </div>
        </div>

    <!-- Custom Button-->
        <button class="custom-prev absolute left-3 top-1/2 -translate-y-1/2 bg-white/80 text-teal-500 p-2 rounded-full hover:bg-teal-500 hover:text-white transition z-10">
            ‹
        </button>
        <button class="custom-next absolute right-3 top-1/2 -translate-y-1/2 bg-white/80 text-teal-500 p-2 rounded-full hover:bg-teal-500 hover:text-white transition z-10">
            ›
        </button>
    </div>
</div>


</main>

    <div class="container">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-xl font-semibold text-gray-700 text-center mx-14" >ALL INFLUENCERS</h3>
    </div>
    @if (count($influencers) > 0)
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mx-12">
            @foreach ($influencers as $influencer)
                <div class="col">
                    <div class="card h-100 shadow-sm rounded-lg">
                        <div class="card-body">
                            <h5 class="card-title text-base font-bold">{{ $influencer['username'] }}</h5>
                            <p class="card-text text-sm text-gray-400 mb-1"> {{ $influencer['category'] }}</p>
                            <p class="card-text mb-1 text-sm">Followers: {{ $influencer['followers'] }}</p>
                            <a href="{{ $influencer['profile_url'] }}" 
                            target="_blank" 
                            class="bg-teal-500 text-white text-sm font-normal px-3 py-1 rounded-xl hover:bg-teal-600 mt-2 inline-flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                              </svg>                              
                             Profile
                         </a>
                         

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-6">
            <a href="{{ route('account.influencers') }}"
            class="bg-teal-500 text-white font-medium px-4 py-1 rounded-full hover:bg-teal-600 transition">
                Load More
            </a>
        </div>

    @else
        <div class="alert alert-warning mt-4">
            Tidak ada data influencer pada kategori ini.
        </div>
    @endif
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 3000,
            },
            navigation: {
                nextEl: '.custom-next',
                prevEl: '.custom-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });
</script>
@endsection

