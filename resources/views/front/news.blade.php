<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Manca Negara</title>
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
        .active{
            color: white !important
        }
        .nav-link:hover {
            color: white !important;
        }
        .news-ticker {
            background-color: #f8f9fa;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .main-content {
            background-color: white;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .featured-news img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 5px;
        }
        .featured-news h2 {
            font-size: 1.5rem;
            margin-top: 1rem;
        }
        .side-news {
            border-left: 1px solid #e0e0e0;
            padding-left: 1rem;
        }
        .side-news-item {
            display: flex;
            margin-bottom: 1rem;
        }
        .side-news-item img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 1rem;
        }
        .side-news-item h5 {
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }
        .side-news-item p {
            font-size: 0.8rem;
            color: #666;
        }
        .trendy-news h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        .trendy-news-item {
            margin-bottom: 1rem;
        }
        .trendy-news-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        .trendy-news-item h5 {
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
        .navbar-toggler{
            color: white !important
        }
        .clickable:hover{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('front.news', ['kategori' => 'business']) }}">News</a>
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

    
    @if(session('error'))
    <div class="news-ticker">
        <div class="container">
            <strong>Notice:</strong> {{ session('error') }}
        </div>
    </div>
    @endif

    @if (collect($articles)->isEmpty())
        <div class="alert alert-warning" role="alert">
            Tidak ada berita untuk kategori ini.
        </div>
    @else
    <div class="container mt-4">
        <div class="main-content">
            <div class="row">
                <div class="col-md-8 featured-news">
                    <div class="clickable" onclick="openInNewTab(`{{ $articles[0]['url'] }}`)">
                        <img src="{{ $articles[0]['urlToImage'] }}" alt="Featured News">
                        <h2>{{ $articles[0]['title'] }}</h2>
                        <p>{{ $articles[0]['description'] }}</p>
                    </div>
                </div>
                <div class="col-md-4 side-news">
                    @foreach (collect($articles)->slice(1, 5) as $item)
                    <div class="clickable" onclick="openInNewTab(`{{ $item['url'] }}`)">
                        <div class="side-news-item">
                            <img src="{{ $item['urlToImage'] }}" alt="urlToImage">
                            <div>
                                <h5>{{ $item['title'] ?? 'Judul tidak tersedia' }}</h5>
                                <p>{{ \Carbon\Carbon::parse($item['pubDate'] ?? now())->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="trendy-news mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Berita Terkait</h3>
                    <a href="{{ route('front.newsall', ['kategori' => request()->kategori ?? 'business']) }}">Lihat Semua Berita</a>
                </div>
                <div class="row">
                    @foreach (collect($articles)->slice(6, 4) as $item)
                    <div class="col-md-3 trendy-news-item">
                        <div class="clickable" onclick="openInNewTab(`{{ $item['url'] }}`)">
                            @if(isset($item['urlToImage']))
                                <img src="{{ $item['urlToImage'] }}" alt="urlToImage">
                            @endif
                            <h5>{{ $item['title'] ?? 'Judul tidak tersedia' }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center">
               <a href="{{ route('front.beritaindo.csv', ['kategori' => request()->kategori ?? 'business']) }}" class="btn btn-success">Unduh CSV Kategori Ini</a>
           </div>
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function openInNewTab(url) {
            window.open(url, '_blank');
        }
    </script>
</body>
</html>