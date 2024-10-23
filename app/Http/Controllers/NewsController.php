<?php

// app/Http/Controllers/NewsController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        // Fetch articles about Apple
        $appleApiKey = '9b210603eca74234a94c0958afa14c0e';
        $appleUrl = "https://newsapi.org/v2/everything?q=apple&from=2024-10-22&to=2024-10-22&sortBy=popularity&apiKey={$appleApiKey}";
        $appleResponse = Http::get($appleUrl);
        $appleArticles = $appleResponse->json()['articles'] ?? [];
    
        // Fetch articles about Tesla
        $teslaApiKey = '9b210603eca74234a94c0958afa14c0e';
        $teslaUrl = "https://newsapi.org/v2/everything?q=tesla&from=2024-09-23&sortBy=publishedAt&apiKey={$teslaApiKey}";
        $teslaResponse = Http::get($teslaUrl);
        $teslaArticles = $teslaResponse->json()['articles'] ?? [];
    
        // Fetch top business headlines
        $businessApiKey = '9b210603eca74234a94c0958afa14c0e';
        $businessUrl = "https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey={$businessApiKey}";
        $businessResponse = Http::get($businessUrl);
        $businessArticles = $businessResponse->json()['articles'] ?? [];
    
        // Fetch articles from TechCrunch
        $techCrunchApiKey = '9b210603eca74234a94c0958afa14c0e';
        $techCrunchUrl = "https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey={$techCrunchApiKey}";
        $techCrunchResponse = Http::get($techCrunchUrl);
        $techCrunchArticles = $techCrunchResponse->json()['articles'] ?? [];
    
        // Fetch articles from WSJ
        $wsjApiKey = '9b210603eca74234a94c0958afa14c0e';
        $wsjUrl = "https://newsapi.org/v2/everything?domains=wsj.com&apiKey={$wsjApiKey}";
        $wsjResponse = Http::get($wsjUrl);
        $wsjArticles = $wsjResponse->json()['articles'] ?? [];
    
        // Fetch articles from The Guardian
        $guardianApiKey = '00f41a70-3675-4ef1-8210-31e9952344fb';
        $guardianUrl = "https://content.guardianapis.com/search?api-key={$guardianApiKey}";
        $guardianResponse = Http::get($guardianUrl);
        $guardianArticles = $guardianResponse->json()['response']['results'] ?? [];
        return view('front.berita', compact('appleArticles', 'teslaArticles', 'businessArticles', 'techCrunchArticles', 'wsjArticles', 'guardianArticles'));
    }
}

