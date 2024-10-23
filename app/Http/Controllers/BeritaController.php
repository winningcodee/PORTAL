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

        $response = Http::get("https://api-berita-indonesia.vercel.app/antara/{$kategori}");

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

        foreach ($validCategories as $kategori) {
            $response = Http::get("https://api-berita-indonesia.vercel.app/antara/{$kategori}");

            if ($response->successful()) {
                $data = $response->json();
                $berita = $data['data']['posts'] ?? [];
                $allBerita = array_merge($allBerita, $berita);
            }
        }

        // Membuat CSV
        $csv = [];
        $csv[] = ['Judul', 'Deskripsi', 'Tanggal', 'Link']; // Header CSV

        foreach ($allBerita as $item) {
            $csv[] = [
                $item['title'] ?? 'Judul tidak tersedia',
                $item['description'] ?? 'Deskripsi tidak tersedia',
                \Carbon\Carbon::parse($item['pubDate'] ?? now())->format('d M Y H:i'),
                $item['link'] ?? '#'
            ];
        }

        if (empty($allBerita)) {
            return redirect()->back()->with('error', 'Tidak ada berita untuk diunduh.');
        }

        // Menyimpan ke file CSV
        $fileName = "berita_semua_kategori.csv";
        $fileContent = fopen('php://memory', 'w');
        foreach ($csv as $line) {
            fputcsv($fileContent, $line);
        }
        fseek($fileContent, 0);

        return response()->streamDownload(function () use ($fileContent) {
            fpassthru($fileContent);
        }, $fileName, ['Content-Type' => 'text/csv']);
    }
}
