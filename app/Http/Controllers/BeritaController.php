<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class BeritaController extends Controller
{
    public function index(Request $request, $kategori = 'terbaru')
    {
        $validCategories = [
            'terbaru', 'politik', 'hukum', 'ekonomi', 'bola', 'olahraga', 
            'humaniora', 'lifestyle', 'hiburan', 'dunia', 'tekno', 'otomotif'
        ];

        $kategori = $request->get('kategori', 'terbaru');

        if (!in_array($kategori, $validCategories)) {
            return response()->json(['error' => 'Kategori tidak valid.'], 400);
        }

        $response = Http::get("https://api-berita-indonesia.vercel.app/sindonews/{$kategori}");

        if ($response->successful()) {
            $data = $response->json();
            $berita = collect($data['data']['posts'] ?? []);
        } else {
            $berita = collect();
        }

        return view('front.beritaindo', compact('berita'));
    }

    public function downloadCsv(Request $request)
{
    $validCategories = [
        'terbaru', 'politik', 'hukum', 'ekonomi', 'bola', 'olahraga', 
        'humaniora', 'lifestyle', 'hiburan', 'dunia', 'tekno', 'otomotif'
    ];

    $allBerita = [];

    // Fetch news articles from all valid categories
    foreach ($validCategories as $kategori) {
        $response = Http::get("https://api-berita-indonesia.vercel.app/sindonews/{$kategori}");

        if ($response->successful()) {
            $data = $response->json();
            $berita = $data['data']['posts'] ?? [];

            // Add formatted berita items to allBerita
            foreach ($berita as &$item) {
                $allBerita[] = [
                    'Judul' => $item['title'] ?? 'Judul tidak tersedia',
                    'Deskripsi' => $item['description'] ?? 'Deskripsi tidak tersedia',
                    'Tanggal' => \Carbon\Carbon::parse($item['pubDate'] ?? now())->format('d M Y H:i'),
                    'Link' => $item['link'] ?? '#',
                    'Kategori' => $kategori // Add category to each item
                ];
            }
        }
    }

    // Check if any berita was retrieved
    if (empty($allBerita)) {
        return redirect()->back()->with('error', 'Tidak ada berita untuk diunduh.');
    }

    // Prepare CSV data
    $csv = [];
    $csv[] = ['Judul', 'Deskripsi', 'Tanggal', 'Link', 'Kategori']; // CSV Header

    // Add berita data to the CSV array
    foreach ($allBerita as $item) {
        $csv[] = [
            $item['Judul'],
            $item['Deskripsi'],
            $item['Tanggal'],
            $item['Link'],
            $item['Kategori']
        ];
    }

    // Save to CSV file
    $fileName = "berita_semua_kategori.csv";
    $fileContent = fopen('php://memory', 'w');
    
    // Write CSV lines
    foreach ($csv as $line) {
        fputcsv($fileContent, $line);
    }
    fseek($fileContent, 0);

    return response()->streamDownload(function () use ($fileContent) {
        fpassthru($fileContent);
    }, $fileName, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$fileName\""
    ]);
}

    
}
