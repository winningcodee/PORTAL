<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Slider Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 20px;
        }
        .slider-container {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            gap: 20px;
            padding-bottom: 10px;
        }
        .article-box {
            min-width: 300px;
            flex: 0 0 auto;
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            scroll-snap-align: start;
        }
        h2 {
            font-size: 1.2em;
            color: #343a40;
        }
        p {
            color: #6c757d;
            font-size: 0.9em;
        }
        .slider-controls {
            text-align: center;
            margin-top: 20px;
        }
        .slider-controls button {
            margin: 0 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center">Latest News</h1>

        <h2 class="text-center">Apple News</h2>
        <div class="slider-container" id="apple-news-container">
            @forelse ($appleArticles as $article)
                <div class="article-box card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article['title'] }}</h2>
                        <p class="card-text">{{ $article['description'] ?? 'No description available.' }}</p>
                        <a href="{{ $article['url'] }}" class="btn btn-primary" target="_blank">Read more</a>
                    </div>
                </div>
            @empty
                <p>No articles found for Apple.</p>
            @endforelse
        </div>

        <div class="slider-controls">
            <button id="prev-apple-btn" class="btn btn-secondary">Previous</button>
            <button id="next-apple-btn" class="btn btn-secondary">Next</button>
        </div>

        <h2 class="text-center">Tesla News</h2>
        <div class="slider-container" id="tesla-news-container">
            @forelse ($teslaArticles as $article)
                <div class="article-box card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article['title'] }}</h2>
                        <p class="card-text">{{ $article['description'] ?? 'No description available.' }}</p>
                        <a href="{{ $article['url'] }}" class="btn btn-primary" target="_blank">Read more</a>
                    </div>
                </div>
            @empty
                <p>No articles found for Tesla.</p>
            @endforelse
        </div>

        <div class="slider-controls">
            <button id="prev-tesla-btn" class="btn btn-secondary">Previous</button>
            <button id="next-tesla-btn" class="btn btn-secondary">Next</button>
        </div>

        <h2 class="text-center">Business News</h2>
        <div class="slider-container" id="business-news-container">
            @forelse ($businessArticles as $article)
                <div class="article-box card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article['title'] }}</h2>
                        <p class="card-text">{{ $article['description'] ?? 'No description available.' }}</p>
                        <a href="{{ $article['url'] }}" class="btn btn-primary" target="_blank">Read more</a>
                    </div>
                </div>
            @empty
                <p>No articles found for Business.</p>
            @endforelse
        </div>

        <div class="slider-controls">
            <button id="prev-business-btn" class="btn btn-secondary">Previous</button>
            <button id="next-business-btn" class="btn btn-secondary">Next</button>
        </div>

        <h2 class="text-center">TechCrunch News</h2>
        <div class="slider-container" id="techcrunch-news-container">
            @forelse ($techCrunchArticles as $article)
                <div class="article-box card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article['title'] }}</h2>
                        <p class="card-text">{{ $article['description'] ?? 'No description available.' }}</p>
                        <a href="{{ $article['url'] }}" class="btn btn-primary" target="_blank">Read more</a>
                    </div>
                </div>
            @empty
                <p>No articles found for TechCrunch.</p>
            @endforelse
        </div>

        <div class="slider-controls">
            <button id="prev-techcrunch-btn" class="btn btn-secondary">Previous</button>
            <button id="next-techcrunch-btn" class="btn btn-secondary">Next</button>
        </div>

        <h2 class="text-center">WSJ News</h2>
        <div class="slider-container" id="wsj-news-container">
            @forelse ($wsjArticles as $article)
                <div class="article-box card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article['title'] }}</h2>
                        <p class="card-text">{{ $article['description'] ?? 'No description available.' }}</p>
                        <a href="{{ $article['url'] }}" class="btn btn-primary" target="_blank">Read more</a>
                    </div>
                </div>
            @empty
                <p>No articles found for WSJ.</p>
            @endforelse
        </div>

        <div class="slider-controls">
            <button id="prev-wsj-btn" class="btn btn-secondary">Previous</button>
            <button id="next-wsj-btn" class="btn btn-secondary">Next</button>
        </div>

        <h2 class="text-center">Guardian News</h2>
        <div class="slider-container" id="guardian-news-container">
            @forelse ($guardianArticles as $article)
                <div class="article-box card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article['webTitle'] }}</h2>
                        <p class="card-text">{{ $article['webDescription'] ?? 'No description available.' }}</p>
                        <a href="{{ $article['webUrl'] }}" class="btn btn-primary" target="_blank">Read more</a>
                    </div>
                </div>
            @empty
                <p>No articles found for The Guardian.</p>
            @endforelse
        </div>
        

        <div class="slider-controls">
            <button id="prev-guardian-btn" class="btn btn-secondary">Previous</button>
            <button id="next-guardian-btn" class="btn btn-secondary">Next</button>
        </div>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript for slider functionality
        function addSliderFunctionality(containerId, prevBtnId, nextBtnId) {
            const container = document.getElementById(containerId);
            const prevBtn = document.getElementById(prevBtnId);
            const nextBtn = document.getElementById(nextBtnId);
            let scrollAmount = 0;

            nextBtn.addEventListener('click', () => {
                scrollAmount += 300; // Adjust scroll amount as needed
                container.scrollTo({ left: scrollAmount, behavior: 'smooth' });
            });

            prevBtn.addEventListener('click', () => {
                scrollAmount -= 300; // Adjust scroll amount as needed
                if (scrollAmount < 0) scrollAmount = 0; // Prevent scrolling past the start
                container.scrollTo({ left: scrollAmount, behavior: 'smooth' });
            });
        }

       // Initialize sliders
addSliderFunctionality('apple-news-container', 'prev-apple-btn', 'next-apple-btn');
addSliderFunctionality('tesla-news-container', 'prev-tesla-btn', 'next-tesla-btn');
addSliderFunctionality('business-news-container', 'prev-business-btn', 'next-business-btn');
addSliderFunctionality('techcrunch-news-container', 'prev-techcrunch-btn', 'next-techcrunch-btn');
addSliderFunctionality('wsj-news-container', 'prev-wsj-btn', 'next-wsj-btn');
addSliderFunctionality('guardian-news-container', 'prev-guardian-btn', 'next-guardian-btn');
addSliderFunctionality('indonesian-news-container', 'prev-indonesian-btn', 'next-indonesian-btn'); // Add this line
    </script>
</body>
</html>
