@extends('layouts.app')

@section('content')

<div class="container mt-4">
    @if(!empty($recommendations))
        <h3 class="text-gray-700 text-base mx-12 mt-8 mb-4">
            Influencers recommendations based on <strong>{{ $influencer }}</strong>
            (Category: <strong>{{ $category }}</strong>)
        </h3>

        <div class="row row-cols-1 row-cols-md-4 g-3 mx-10">
            @foreach($recommendations as $name => $data)
                <div class="col">
                    <div class="card shadow-sm h-100 rounded-lg">
                        <div class="card-body">
                            <h5 class="card-title text-base font-bold">{{ $name }}</h5>
                            <p class="ard-text mb-1 text-sm">Followers: {{ $data['followers'] }}</p>
                            <a href="{{ $data['profile_url'] }}" 
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
    @else
        <div class="alert alert-warning">
            Maaf, tidak ada rekomendasi untuk influencer ini di kategori yang dipilih.
        </div>
    @endif
        <div class="flex justify-end">
             <a href="{{ route('account.recommendations') }}" class="bg-gray-200 text-gray-700 px-4 py-1  rounded-xl hover:bg-teal-600 hover:text-white mt-2 inline-block justify-end mr-10">Back</a>
        </div>
</div>

@endsection
