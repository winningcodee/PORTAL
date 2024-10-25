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
            <a class="navbar-brand" href="{{ route('front.news', ['kategori' => 'business']) }}">Berita Indonesia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'business' ? 'active' : '' }}" href="{{ route('front.news', ['kategori' => 'business']) }}">Business</a>
                    </li>
                    <li class="nav-item"><a class="nav-link {{ request()->kategori == 'apple' ? 'active' : '' }}" href="{{ route('front.news', ['kategori' => 'apple']) }}">Apple</a></li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'tesla' ? 'active' : '' }}" href="{{ route('front.news', ['kategori' => 'tesla']) }}">Tesla</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'techcrunch' ? 'active' : '' }}" href="{{ route('front.news', ['kategori' => 'techcrunch']) }}">TechCrunch</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'wsj' ? 'active' : '' }}" href="{{ route('front.news', ['kategori' => 'wsj']) }}">WSJ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->kategori == 'guardian' ? 'active' : '' }}" href="{{ route('front.news', ['kategori' => 'guardian']) }}">Guardian</a>
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

            @if (collect($articles)->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Tidak ada news untuk kategori ini.
                </div>
            @else
            <div class="row">
                @foreach (collect($articles) as $item)
                <div class="col-md-4 news-item">
                    @if(isset($item['urlToImage']))
                        <img src="{{ $item['urlToImage'] }}" alt="thumbnail">
                    @endif
                    <h3>{{ $item['title'] ?? 'Judul tidak tersedia' }}</h3>
                    <p>{{ collect($articles)[0]['description'] }}</p>
                    <a href="{{ $item['url'] ?? '#' }}" target="_blank" class="btn btn-primary btn-sm">Selengkapnya</a>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>