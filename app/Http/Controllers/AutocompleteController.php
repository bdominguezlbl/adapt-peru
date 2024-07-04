<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AutocompleteController extends Controller
{
    //
    public function autocomplete(Request $request)
    {
        $query = $request->get('query');

        $apiKey = env('GOOGLE_KEY');
        $url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?input=" . urlencode($query) . "&key=" . $apiKey;

        $response = Http::get($url);

        return $response->json();
    }
}
