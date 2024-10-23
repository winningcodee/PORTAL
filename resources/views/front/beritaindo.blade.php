<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Indonesia</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>
<body>
    <div class="container my-4">
        <h1 class="text-center mb-4">Berita Kategori: {{ request()->kategori ?? 'Terbaru' }}</h1>

        <!-- Kategori Dropdown -->
        <div class="text-center mb-4">
            <form action="{{ route('front.beritaindo') }}" method="GET">
                <select name="kategori" onchange="this.form.submit()" class="form-control w-auto d-inline-block">
                    <option value="terbaru" {{ request()->kategori == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                    <option value="politik" {{ request()->kategori == 'politik' ? 'selected' : '' }}>Politik</option>
                    <option value="hukum" {{ request()->kategori == 'hukum' ? 'selected' : '' }}>Hukum</option>
                    <option value="ekonomi" {{ request()->kategori == 'ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                    <option value="bola" {{ request()->kategori == 'bola' ? 'selected' : '' }}>Bola</option>
                    <option value="olahraga" {{ request()->kategori == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                    <option value="humaniora" {{ request()->kategori == 'humaniora' ? 'selected' : '' }}>Humaniora</option>
                    <option value="lifestyle" {{ request()->kategori == 'lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                    <option value="hiburan" {{ request()->kategori == 'hiburan' ? 'selected' : '' }}>Hiburan</option>
                    <option value="dunia" {{ request()->kategori == 'dunia' ? 'selected' : '' }}>Dunia</option>
                    <option value="tekno" {{ request()->kategori == 'tekno' ? 'selected' : '' }}>Tekno</option>
                    <option value="otomotif" {{ request()->kategori == 'otomotif' ? 'selected' : '' }}>Otomotif</option>        
                </select>
            </form>
        </div>
        
        @if ($berita->isEmpty())
            <div class="alert alert-warning" role="alert">
                Tidak ada berita untuk kategori ini.
            </div>
        @else
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($berita as $item)
                        <div class="swiper-slide text-center">
                            <h2>{{ $item['title'] ?? 'Judul tidak tersedia' }}</h2>
                            <p>{{ $item['description'] ?? 'Deskripsi tidak tersedia' }}</p>
                            <p><a class="btn btn-primary" href="{{ $item['link'] ?? '#' }}" target="_blank">Baca Selengkapnya</a></p>
                            <p><small class="text-muted">{{ \Carbon\Carbon::parse($item['pubDate'] ?? now())->format('d M Y H:i') }}</small></p>
                            @if(isset($item['thumbnail']))
                                <img src="{{ $item['thumbnail'] }}" alt="Thumbnail">
                            @endif
                        </div>
                    @endforeach
                </div>
                <!-- Tambahkan navigasi -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        @endif
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true, // Untuk loop berita
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>
</html>
