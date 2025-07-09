@extends('layouts.app')

@section('content')
    <main class="flex justify-center p-12 mt-6 mx-10">
        <div class="max-w-2xl w-full">
            <h2 class="text-2xl  text-gray-700 font-bold mb-2">Contact Us</h2>
            <p class="text-gray-600 mb-4">
                If you have any questions about inspo, contact us via email or phone number. We will be happy to help you!
            </p>
            <div class="mb-6">
                <p class="flex items-center text-gray-600 mb-2">
                  <img src="{{ asset('icons/call.svg') }}" alt="" class="w-5 h-5 mr-2 align-middle">
                    +462-830-927
                </p>
                <p class="flex items-center text-gray-600 mb-2">
                  <img src="{{ asset('icons/email-icon.svg') }}" alt="" class="w-5 h-5 mr-2 align-middle">
                    inspo@gmail.com
                </p>
                <p class="flex items-center text-gray-600 mb-2">
                  <img src="{{ asset('icons/location.svg') }}" alt="" class="w-5 h-5 mr-2 align-middle">
                    Klaten, Jawa Tengah
                </p>
                <p class="flex items-center text-gray-600 mb-2">
                  <img src="{{ asset('icons/work-hours.svg') }}" alt="" class="w-5 h-5 mr-2 align-middle">
                   Monday - Friday 
                   (09:00 - 17:00)
                </p>
            </div>
        </div>
        <div class="hidden lg:block ml-20">
          <img src="{{ asset('images/contact-image.svg') }}" alt="" class="mr-32">
        </div>
    </main>

@endsection