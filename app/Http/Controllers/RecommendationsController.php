<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationsController extends Controller
{
        public function showForm()
        {
            $user = Auth::check() ? Auth::user() : null;

            try {
                // Ambil data influencer
                $client = new \GuzzleHttp\Client();
                $response = $client->request('GET', 'http://127.0.0.1:5000/get_influencers');
                $influencers = json_decode($response->getBody(), true);

                $categories = array_keys($influencers);

                return view('recommendations', compact('influencers', 'categories'));
            } catch (\Exception $e) {
                return back()->with('error', 'Gagal mengambil data influencer: ' . $e->getMessage());
            }
        }

    public function getRecommendations(Request $request)
{
    // Ambil kategori dan influencer yang dipilih
    $category = $request->input('category');
    $influencer = $request->input('influencer');

    try {
        // Kirim data ke API Flask untuk mendapatkan rekomendasi
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://d35b97889511.ngrok-free.app/recommend', [
            'json' => [
                'Category' => $category,
                'Username' => $influencer
            ]
        ]);

        // Pastikan response status OK
        if ($response->getStatusCode() != 200) {
            return back()->with('error', 'Gagal mendapatkan rekomendasi: Respons API tidak valid.');
        }

        // Ambil rekomendasi dari response API Flask
        $recommendationsRaw = json_decode($response->getBody(), true);
        $recommendations = [];

            foreach ($recommendationsRaw as $name => $data) {
                $recommendations[$name] = [
                    'similarity_score' => $data['similarity_score'],
                    'profile_url' => $data['profile_url'],
                    'followers' => $this->formatFollowers($data['followers'] ?? 0),
                ];
            }

            // Sorting manual jika masih ingin berdasarkan similarity_score
            $recommendations = collect($recommendations)->sortByDesc('similarity_score');



        // Kirim data ke view
        return view('result', [
            'recommendations' => $recommendations,
            'category' => $category,
            'influencer' => $influencer,
            'followers' => $this->formatFollowers($data['followers'] ?? 0),
        ]);

    } catch (\Exception $e) {
        // Menangani error jika API gagal
        return back()->with('error', 'Gagal mendapatkan rekomendasi: ' . $e->getMessage());
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
