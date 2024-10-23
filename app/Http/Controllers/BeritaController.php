<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BeritaController extends Controller
{
  public function index(Request $request, $kategori = 'terbaru')
  {
    // Daftar kategori yang valid
    $validCategories = ['terbaru', 'politik', 'hukum', 'ekonomi', 'bola', 'olahraga', 'humaniora', 'lifestyle', 'hiburan', 'dunia', 'tekno', 'otomotif'];

    // Ambil kategori dari request, jika tidak ada gunakan default 'terbaru'
    $kategori = $request->get('kategori', 'terbaru');

    // Validasi kategori yang diterima
    if (!in_array($kategori, $validCategories)) {
        return response()->json(['error' => 'Kategori tidak valid.'], 400);
    }

    $response = Http::get("https://api-berita-indonesia.vercel.app/antara/{$kategori}");

    // Cek jika response berhasil
    if ($response->successful()) {
        $data = $response->json();
        $berita = collect($data['data']['posts'] ?? []);
    } else {
        $berita = collect(); // Jika gagal, set berita ke koleksi kosong
    }

    return view('front.beritaindo', compact('berita'));
  }
}
