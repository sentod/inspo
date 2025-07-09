@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="flex items-center justify-between my-4">
        <h3 class="text-xl mb-2 font-semibold text-gray-700 mx-12">LIST INFLUENCERS</h3>

        {{-- Dropdown Kategori --}}
        <form method="GET" action="{{ route('account.influencers') }}" class="rounded-full">
        <div x-data="{ open: false }" class="relative inline-block text-left w-42 mx-12">
            <!-- Toggle Button -->
            <button 
                @click.prevent="open = !open"
                type="button" 
                class="inline-flex items-center justify-start w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:border-teal-500"
            >
                <img src="{{ asset('icons/filter.svg') }}" alt="Filter Icon" class="w-4 h-4 mr-2">
                {{ request('category') ?? 'Filter by Category' }}
            </button>

            <!-- Dropdown Panel -->
            <div 
                x-show="open"
                x-cloak
                class="absolute mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                role="menu" 
                aria-orientation="vertical" 
                aria-labelledby="menu-button"
            >
                <div class="py-1" role="none">
                    <a href="{{ route('account.influencers') }}"
                        @click="setTimeout(() => open = false, 100)"
                        class="text-gray-700 block px-4 py-2 text-sm hover:bg-teal-100"
                        role="menuitem">
                        All Categories
                    </a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('account.influencers', ['category' => $cat]) }}"
                            @click="setTimeout(() => open = false, 100)"
                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-teal-100 {{ request('category') == $cat ? 'text-teal-500 font-semibold' : '' }}"
                            role="menuitem">
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        </form>
    </div>
    @if (count($influencers) > 0)
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mx-10">
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

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $influencers->withQueryString()->links() }}
        </div>
    @else
        <div class="alert alert-warning mt-4">
            Tidak ada data influencer pada kategori ini.
        </div>
    @endif
</div>
@endsection
