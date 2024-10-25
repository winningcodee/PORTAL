<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .navbar {
            background-color: #1a1a1a;
            padding: 0.5rem 1rem;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .nav-link {
            color: #a0a0a0 !important;
            font-size: 0.9rem;
            padding: 0.5rem 1rem !important;
        }
        .nav-link:hover {
            color: white !important;
        }
        .main-content {
            background-color: white;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .news-item {
            margin-bottom: 1.5rem;
        }
        .news-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }
        .news-item h3 {
            font-size: 1.2rem;
            margin-top: 0.5rem;
        }
        .news-item p {
            font-size: 0.9rem;
            color: #666;
        }
        .active{
            color: white !important
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('front.beritaindo', ['kategori' => 'terbaru']) }}">Berita Indonesia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link {{ request()->kategori == 'politik' ? 'active' : '' }}" href="{{ route('front.beritaindo', ['kategori' => 'politik']) }}">Politik</a></li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'hukum' ? 'active' : '' }}" href="{{ route('front.beritaindo', ['kategori' => 'hukum']) }}">Hukum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'ekonomi' ? 'active' : '' }}" href="{{ route('front.beritaindo', ['kategori' => 'ekonomi']) }}">Ekonomi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'bola' ? 'active' : '' }}" href="{{ route('front.beritaindo', ['kategori' => 'bola']) }}">Bola</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'olahraga' ? 'active' : '' }}" href="{{ route('front.beritaindo', ['kategori' => 'olahraga']) }}">Olahraga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'humaniora' ? 'active' : '' }}" href="{{ route('front.beritaindo', ['kategori' => 'humaniora']) }}">Humaniora</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'lifestyle' ? 'active' : '' }}" href="{{ route('front.beritaindo', ['kategori' => 'lifestyle']) }}">Lifestyle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'hiburan' ? 'active' : '' }}" href="{{ route('front.beritaindo', ['kategori' => 'hiburan']) }}">Hiburan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'dunia' ? 'active' : '' }}" href="{{ route('front.beritaindo', ['kategori' => 'dunia']) }}">Dunia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'tekno' ? 'active' : '' }}" href="{{ route('front.beritaindo', ['kategori' => 'tekno']) }}">Tekno</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'otomotif' ? 'active' : '' }}" href="{{ route('front.beritaindo', ['kategori' => 'otomotif']) }}">Otomotif</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="main-content">
            <h1 class="mb-4">All News</h1>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($berita->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Tidak ada berita untuk kategori ini.
                </div>
            @else
            <div class="row">
                @foreach ($berita as $item)
                <div class="col-md-4 news-item">
                    @if(isset($item['thumbnail']))
                        <img src="{{ $item['thumbnail'] }}" alt="thumbnail">
                    @endif
                    <h3>{{ $item['title'] ?? 'Judul tidak tersedia' }}</h3>
                    <p>{{ $berita[0]['description'] }}</p>
                    <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="btn btn-primary btn-sm">Selengkapnya</a>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>