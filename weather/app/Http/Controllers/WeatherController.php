<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    function index()
    {
        $reponse = Http::get('http://api.openweathermap.org/data/2.5/weather', [
            'q' => 'Hue',
            'appid' => 'cd01c9cb241680e5de9528fdb9c58bd1'
        ]);
        $dataJson = $reponse->body();
        $result = json_decode($dataJson);
        $celcius = $result->main->temp - 273;
        $nameCity = $result->name;
        $main = $result->weather[0]->main;
        $windSpeed = $result->wind->speed;
        $cloudy = $result->clouds->all;
        $humidity = $result->main->humidity;
        return view('weather.index', compact('celcius', 'nameCity', 'main', 'windSpeed', 'cloudy', 'humidity'));
    }

    function change($city)
    {
        $reponse = Http::get('http://api.openweathermap.org/data/2.5/weather', [
            'q' => $city,
            'appid' => 'cd01c9cb241680e5de9528fdb9c58bd1'
        ]);
        $dataJson = $reponse->body();
        $result = json_decode($dataJson);
        $celcius = $result->main->temp - 273;
        $celcius = number_format($celcius);
        $nameCity = $result->name;
        $main = $result->weather[0]->main;
        $windSpeed = $result->wind->speed;
        $cloudy = $result->clouds->all;
        $humidity = $result->main->humidity;
        return response()->json(['celcius' => $celcius, 'nameCity' => $nameCity, 'main' => $main, 'windSpeed' => $windSpeed, 'cloudy' => $cloudy, 'humidity' => $humidity]);
    }
}
