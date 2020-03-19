<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index()
    {
        $latitude = 53.2520900;
        $longitude = 34.3716700;

        $weather = $this->getWeather($latitude, $longitude);

        return view('weather.weather', compact('weather'));
    }

    private function getWeather($latitude, $longitude)
    {
        $token = env('YANDEX_API_TOKEN');

        $client = new Client();
        $param = [
            'headers' => ['X-Yandex-API-Key' => $token]
        ];

        $res = $client->get('https://api.weather.yandex.ru/v1/forecast?lat=' . $latitude . '&lon=' . $longitude,  $param);

        $content = $res->getBody()->getContents();

        return json_decode($content);
    }
}
