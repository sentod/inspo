@extends('layouts.app')

@section('content')

<div class="relative w-full mb-4">
    <img 
        src="{{ asset('images/poster-recommendation.png') }}" 
        alt="Header Banner" 
        class="w-full h-80 object-cover"
    />
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- Card untuk Pilihan Kategori --}}
            <div class="card shadow-sm border-0 rounded-lg mb-4 mx-10">
                <h2 class="text-base font-bold text-gray-500 ml-8 mt-3">What category are you looking for?</h2>
                <div class="card-body mx-4">
                    <div id="categoryButtons" class="flex flex-wrap gap-2 justify-center">
                        @foreach(array_keys($influencers) as $category)
                            <button 
                                type="button" 
                                class="category-btn px-4 py-2 border-1 border-teal-500 text-gray-500 rounded-md hover:bg-teal-500 hover:text-white transition"
                                data-category="{{ $category }}">
                                {{ $category }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Card untuk Pilih Influencer --}}
        <form action="{{ route('account.result') }}" method="POST">
            <div class="card shadow-sm border-0 rounded-lg mt-4 mx-10">
                <h2 class="text-base font-bold text-gray-500 ml-8 mt-3">Who are the influencers you know?</h2>
                <div class="card-body mx-4">
                        @csrf
                        <input type="hidden" name="category" id="selectedCategory">

                        <div class="mb-3">
                        <select 
                            id="influencer" 
                            name="influencer" 
                            class="form-select text-sm text-gray-400 border-gray-300 cursor-not-allowed bg-gray-100" 
                            disabled 
                            required
                        >
                            <option value="">Select Influencer</option>
                        </select>
                        </div>
                </div>
            </div>
            <div class="d-grid justify-end my-2 mt-4 mb-8">
                <button type="submit" class="bg-teal-500 text-white px-4 py-1 rounded-full hover:bg-teal-600 w-full">
                     Result
                </button>
            </div>
            </form>
            @if(session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    const influencersData = @json($influencers);
    const categoryButtons = document.querySelectorAll('.category-btn');
    const influencerSelect = document.getElementById('influencer');
    const selectedCategoryInput = document.getElementById('selectedCategory');

    categoryButtons.forEach(button => {
        button.addEventListener('click', function () {
            // reset warna tombol
            categoryButtons.forEach(btn => {
                btn.classList.remove('bg-teal-500', 'text-white');
                btn.classList.add('bg-gray-white', 'text-gray-500');
            });

            // mengaktifkan tombol yang diklik
            this.classList.remove('bg-gray-200', 'text-gray-500');
            this.classList.add('bg-teal-500', 'text-white');

            // ambil kategori yang dipilih
            const selectedCategory = this.getAttribute('data-category');
            selectedCategoryInput.value = selectedCategory;

            // kosongkan dropdown influencer
            influencerSelect.innerHTML = '<option value="">Select Influencer</option>';

            // Aktifkan select dan ubah style
            influencerSelect.disabled = false;
            influencerSelect.classList.remove('text-gray-400', 'bg-gray-100', 'border-gray-300', 'cursor-not-allowed');
            influencerSelect.classList.add('text-gray-500', 'bg-white', 'border-teal-500', 'cursor-pointer');


            // debug log
            console.log("Kategori dipilih:", selectedCategory);
            console.log("Data influencer:", influencersData[selectedCategory]);

            // tampilkan influencer berdasarkan kategori
            if (selectedCategory && influencersData[selectedCategory]) {
                influencersData[selectedCategory].forEach(function (influencer) {
                    const option = document.createElement('option');

                    // pastikan key-nya sesuai, 'Username' case-sensitive
                    option.value = influencer.Username;
                    option.textContent = influencer.Username;

                    influencerSelect.appendChild(option);
                });
            }
        });
    });
</script>

@endsection
