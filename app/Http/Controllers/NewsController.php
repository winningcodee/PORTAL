<?php

// app/Http/Controllers/NewsController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function BeritaIndo(Request $request)
    {
        $validCategories = [
            'apple', 'tesla', 'techcrunch', 'business', 'wsj', 'guardian'];

        if ($request->get('kategori') != null){
            $kategori = $request->get('kategori');
        } else {
            $kategori = 'business';
        }

        if (!in_array($kategori, $validCategories)) {
            return response()->json(['error' => 'Kategori tidak valid.'], 400);
        }

        switch ($kategori) {
            case 'tesla':
                // Fetch articles about Tesla
            $teslaApiKey = '9b210603eca74234a94c0958afa14c0e';
            $teslaUrl = "https://newsapi.org/v2/everything?q=tesla&from=2024-09-23&sortBy=publishedAt&apiKey={$teslaApiKey}";
            $teslaResponse = Http::get($teslaUrl);
            $articles = $teslaResponse->json()['articles'] ?? [];
            break;
                
            case 'techcrunch':
            // Fetch articles from TechCrunch
            $techCrunchApiKey = '9b210603eca74234a94c0958afa14c0e';
            $techCrunchUrl = "https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey={$techCrunchApiKey}";
            $techCrunchResponse = Http::get($techCrunchUrl);
            $articles = $techCrunchResponse->json()['articles'] ?? [];
            break;

            case 'business':
                // Fetch top business headlines
            $businessApiKey = '9b210603eca74234a94c0958afa14c0e';
            $businessUrl = "https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey={$businessApiKey}";
            $businessResponse = Http::get($businessUrl);
            $articles = $businessResponse->json()['articles'] ?? [];
            break;

            case 'wsj':
            // Fetch articles from WSJ
            $wsjApiKey = '9b210603eca74234a94c0958afa14c0e';
            $wsjUrl = "https://newsapi.org/v2/everything?domains=wsj.com&apiKey={$wsjApiKey}";
            $wsjResponse = Http::get($wsjUrl);
            $articles = $wsjResponse->json()['articles'] ?? [];
            break;

            case 'guardian':
            // Fetch articles from The Guardian
            $guardianApiKey = '00f41a70-3675-4ef1-8210-31e9952344fb';
            $guardianUrl = "https://content.guardianapis.com/search?api-key={$guardianApiKey}";
            $guardianResponse = Http::get($guardianUrl);
            $guardianArticles = $guardianResponse->json()['response']['results'] ?? [];
            break;
            
            default:
            // Fetch articles about Apple
            $appleApiKey = '9b210603eca74234a94c0958afa14c0e';
            $appleUrl = "https://newsapi.org/v2/everything?q=apple&from=2024-10-22&to=2024-10-22&sortBy=popularity&apiKey={$appleApiKey}";
            $appleResponse = Http::get($appleUrl);
            $articles = $appleResponse->json()['articles'] ?? [];
            break;
        }

        return view('front.news', compact('articles'));
    }

    public function BeritaIndoAll(Request $request)
    {
        $validCategories = [
            'apple', 'tesla', 'techcrunch', 'business', 'wsj', 'guardian'];

        if ($request->get('kategori') != null){
            $kategori = $request->get('kategori');
        } else {
            $kategori = 'business';
        }

        if (!in_array($kategori, $validCategories)) {
            return response()->json(['error' => 'Kategori tidak valid.'], 400);
        }

        switch ($kategori) {
            case 'tesla':
                // Fetch articles about Tesla
            $teslaApiKey = '9b210603eca74234a94c0958afa14c0e';
            $teslaUrl = "https://newsapi.org/v2/everything?q=tesla&from=2024-09-23&sortBy=publishedAt&apiKey={$teslaApiKey}";
            $teslaResponse = Http::get($teslaUrl);
            $articles = $teslaResponse->json()['articles'] ?? [];
            break;
                
            case 'techcrunch':
            // Fetch articles from TechCrunch
            $techCrunchApiKey = '9b210603eca74234a94c0958afa14c0e';
            $techCrunchUrl = "https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey={$techCrunchApiKey}";
            $techCrunchResponse = Http::get($techCrunchUrl);
            $articles = $techCrunchResponse->json()['articles'] ?? [];
            break;

            case 'business':
                // Fetch top business headlines
            $businessApiKey = '9b210603eca74234a94c0958afa14c0e';
            $businessUrl = "https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey={$businessApiKey}";
            $businessResponse = Http::get($businessUrl);
            $articles = $businessResponse->json()['articles'] ?? [];
            break;

            case 'wsj':
            // Fetch articles from WSJ
            $wsjApiKey = '9b210603eca74234a94c0958afa14c0e';
            $wsjUrl = "https://newsapi.org/v2/everything?domains=wsj.com&apiKey={$wsjApiKey}";
            $wsjResponse = Http::get($wsjUrl);
            $articles = $wsjResponse->json()['articles'] ?? [];
            break;

            case 'guardian':
            // Fetch articles from The Guardian
            $guardianApiKey = '00f41a70-3675-4ef1-8210-31e9952344fb';
            $guardianUrl = "https://content.guardianapis.com/search?api-key={$guardianApiKey}";
            $guardianResponse = Http::get($guardianUrl);
            $guardianArticles = $guardianResponse->json()['response']['results'] ?? [];
            break;
            
            default:
            // Fetch articles about Apple
            $appleApiKey = '9b210603eca74234a94c0958afa14c0e';
            $appleUrl = "https://newsapi.org/v2/everything?q=apple&from=2024-10-22&to=2024-10-22&sortBy=popularity&apiKey={$appleApiKey}";
            $appleResponse = Http::get($appleUrl);
            $articles = $appleResponse->json()['articles'] ?? [];
            break;
        }

        return view('front.newsall', compact('articles'));
    }
}

