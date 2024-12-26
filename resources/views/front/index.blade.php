@extends('front.master')
@section('content')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    #Category {
    overflow-x: auto;  /* Membolehkan scroll horizontal */
    white-space: nowrap;  /* Membuat elemen dalam satu baris horizontal */
}

#Category:active {
    cursor: grabbing;  /* Mengubah cursor saat sedang menarik */
}

</style>
    <body class="font-[Poppins] pb-[72px]">
        <x-navbar />
        <div class="relative">
            <!-- Kontainer Navigasi -->
            <nav id="Category" class="max-w-[1130px] mx-auto flex justify-start items-center gap-4 mt-[30px] overflow-x-auto cursor-grab">
                <a href="{{ route('front.news') }}" class="button">Go to Berita</a>
                <!-- Dropdown Navigation -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="newsDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Select News Source
                    </button>
                    <div class="dropdown-menu" aria-labelledby="newsDropdown">
                        <a class="dropdown-item" href="{{ route('front.beritaindo') }}">SINDONEWS</a>
                        <a class="dropdown-item" href="{{ route('front.cnnindo') }}">ANTARA</a>
                    </div>
                </div>
                @foreach ($categories as $category)
                    <a href="{{ route('front.category', $category->slug) }}"
                        class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ Storage::url($category->icon) }}" alt="icon" />
                        </div>
                        <span>{{ $category->name }}</span>
                    </a>
                @endforeach
            </nav>
        </div>
        
        
        <section id="Featured" class="mt-[30px]">
            <div class="main-carousel w-full">

                @forelse($featured_articles as $article)
                    <div class="featured-news-card relative w-full h-[550px] flex shrink-0 overflow-hidden">
                        <img src="{{ Storage::url($article->thumbnail) }}"
                            class="thumbnail absolute w-full h-full object-cover" alt="icon" />
                        <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                        </div>
                        <div
                            class="card-detail max-w-[1130px] w-full mx-auto flex items-end justify-between pb-10 relative z-20">
                            <div class="flex flex-col gap-[10px]">
                                <p class="text-white">Featured</p>
                                <a href="{{ route('front.details', $article->slug) }}"
                                    class="font-bold text-4xl leading-[45px] text-white two-lines hover:underline transition-all duration-300">{{ $article->name }}</a>
                                <p class="text-white">{{ $article->created_at->format('M d, Y') }} •
                                    {{ $article->category->name }}</p>
                            </div>
                            <div class="prevNextButtons flex items-center gap-4 mb-[60px]">
                                <button
                                    class="button--previous appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                                    <img src="assets/images/icons/arrow.svg" alt="arrow" />
                                </button>
                                <button
                                    class="button--next appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 rotate-180">
                                    <img src="assets/images/icons/arrow.svg" alt="arrow" />
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Belum ada data terbaru</p>
                @endforelse

            </div>
        </section>
        <section id="Up-to-date" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
            <div class="flex justify-between items-center">
                <h2 class="font-bold text-[26px] leading-[39px]">
                    Latest Hot News <br />
                    Good for Curiousity
                </h2>
                <p
                    class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">
                    UP TO DATE</p>
            </div>
            <div class="grid grid-cols-3 gap-[30px]">

                @forelse($articles as $article)
                    <a href="{{ route('front.details', $article->slug) }}" class="card-news">
                        <div
                            class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
                            <div
                                class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
                                <p
                                    class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
                                    {{ $article->category->name }}</p>
                                <img src="{{ Storage::url($article->thumbnail) }}" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="card-info flex flex-col gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">{{ $article->name }}</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                    {{ $article->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Belum ada data terbaru...</p>
                @endforelse

            </div>
        </section>
        <section id="Best-authors" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
            <div class="flex flex-col text-center gap-[14px] items-center">
                <p
                    class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">
                    BEST AUTHORS</p>
                <h2 class="font-bold text-[26px] leading-[39px]">
                    Explore All Masterpieces <br />
                    Written by People
                </h2>
            </div>
            <div class="grid grid-cols-6 gap-[30px]">
                @forelse($authors as $author)
                    <a href="{{ route('front.author', $author->slug) }}" class="card-authors">
                        <div
                            class="rounded-[20px] border border-[#EEF0F7] p-[26px_20px] flex flex-col items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                            <div class="w-[70px] h-[70px] flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ Storage::url($author->avatar) }}" class="object-cover w-full h-full"
                                    alt="avatar" />
                            </div>
                            <div class="flex flex-col gap-1 text-center">
                                <p class="font-semibold">{{ $author->name }}</p>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $author->news->count() }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Belum ada data</p>
                @endforelse

            </div>
        </section>


    </body>
    <script>
        let isMouseDown = false;
let startX, scrollLeft;

const categoryNav = document.getElementById('Category');

// Saat mouse ditekan
categoryNav.addEventListener('mousedown', (e) => {
    isMouseDown = true;
    startX = e.pageX - categoryNav.offsetLeft;  // Menyimpan posisi awal mouse
    scrollLeft = categoryNav.scrollLeft;  // Menyimpan posisi scroll saat ini
    categoryNav.style.cursor = 'grabbing';  // Ganti cursor saat menarik
});

// Saat mouse bergerak
categoryNav.addEventListener('mousemove', (e) => {
    if (!isMouseDown) return;  // Jika mouse tidak ditekan, jangan lakukan apa-apa
    e.preventDefault();
    const x = e.pageX - categoryNav.offsetLeft;  // Mendapatkan posisi mouse
    const walk = (x - startX) * 2;  // Mengatur kecepatan scroll
    categoryNav.scrollLeft = scrollLeft - walk;  // Geser konten
});

// Saat mouse dilepas
categoryNav.addEventListener('mouseup', () => {
    isMouseDown = false;
    categoryNav.style.cursor = 'grab';  // Ganti kembali cursor saat mouse dilepas
});

// Saat mouse keluar dari elemen
categoryNav.addEventListener('mouseleave', () => {
    isMouseDown = false;
    categoryNav.style.cursor = 'grab';  // Ganti kembali cursor saat mouse keluar
});

    </script>
    <!-- Include jQuery and Bootstrap JS (if not already included) -->
    <!-- jQuery, Popper.js v1.16.1, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@push('after-styles')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
@endpush
@push('after-scripts')
    <script src="{{ asset('customjs/two-lines-text.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('customjs/carousel.js') }}"></script>
@endpush
