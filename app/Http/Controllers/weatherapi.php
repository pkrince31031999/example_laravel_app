<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class weatherapi extends Controller
{
    public function index()
    {
        $apiKey = '';
        $defaultCity = ''; // Default city if geolocation is not available

        return view('weatherData', compact('apiKey', 'defaultCity'));
    }

    public function getWeatherData(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $apiKey = $request->input('apiKey');
        $additionalData = $request->input('additionalData');

        // Access additional data parameters
        $param1 = isset($additionalData['param1']) ? $additionalData['param1'] : "";
        $param2 = isset($additionalData['param2']) ? $additionalData['param2'] : "";

        $apiUrl = "https://api.weatherapi.com/v1/current.json?key={$apiKey}&q={$latitude},{$longitude}";

        // You can use additionalData parameters in your API request if needed

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $weatherData = $response->json();
            return response()->json(['status' => 'success', 'data' => $weatherData]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error fetching weather data']);
        }
    }
}


