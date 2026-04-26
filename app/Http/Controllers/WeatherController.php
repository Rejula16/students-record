<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather.index');
    }

    public function fetch(Request $request)
    {
        $request->validate([
            'city' => 'required'
        ]);

        $city = $request->city;

        $response = Http::get("https://wttr.in/{$city}?format=j1");

        $data = $response->json();

        $weather = $data['current_condition'][0] ?? [];

        return view('weather.index', compact('weather', 'city'));
    }
}
