<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Ambil data dari Flask API
            $response = Http::get('http://127.0.0.1:5000/get_influencers');

            if ($response->successful()) {
                $data = $response->json();
                $allInfluencers = [];
                $categories = array_keys($data); // Ambil semua kategori
                $selectedCategory = $request->query('category');

                foreach ($data as $category => $influencers) {
                    foreach ($influencers as $influencer) {
                        $followersRaw = $influencer['Followers'] ?? 0;
                        $allInfluencers[] = [
                            'username'    => $influencer['Username'] ?? '-',
                            'category'    => $influencer['Category'] ?? $category,
                            'followers'   => $this->formatFollowers($followersRaw),
                            'profile_url' => $influencer['Profile'] ?? '#',
                        ];
                    }
                }

                // Filter berdasarkan kategori jika dipilih
                if ($selectedCategory) {
                    $allInfluencers = array_filter($allInfluencers, function ($item) use ($selectedCategory) {
                        return $item['category'] === $selectedCategory;
                    });
                }

                return view('home', [
                    'influencers' => array_slice($allInfluencers, 0, 8), // hanya ambil 24 pertama
                    'categories' => $categories,
                    'selectedCategory' => $selectedCategory,
                ]);


            } else {
                return view('home', [
                    'influencers' => [],
                    'categories' => [],
                    'error' => 'Gagal mengambil data dari API (Status: ' . $response->status() . ')'
                ]);
            }

        } catch (\Exception $e) {
            return view('home', [
                'influencers' => [],
                'categories' => [],
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    private function formatFollowers($number)
    {
        if ($number >= 1000000) {
            return round($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'K';
        } else {
            return (string) $number;
        }
    }
}
