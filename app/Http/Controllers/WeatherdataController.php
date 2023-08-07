<?php

namespace App\Http\Controllers;

use App\Models\Weatherdata;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;

class WeatherdataController extends Controller
{
    public function index()
    {   
        $forecast = [];
        $citylist = DB::table('cities')->get();
        foreach ($citylist as $city) {
            $forecast[] = $this->getCityData($city->name);
        }
        return view('current' , ["forecast" => $forecast]);
    }

    public function show(){
        $citylist = DB::table('cities')->get();
        return view('citypick', ["citylist" => $citylist]);
    }

    public function showData(Request $request){
        $city_name = $request['city_name'];
        $yesterday = date('Y-m-d H:i:s',strtotime("-1 days"));
        
        $weatherdatas = DB::table('weatherdatas')
            ->where('name', $city_name)
            ->where('dt', '>=',  $yesterday)
            ->orderBy('dt','desc')
            ->groupBy('dt')
            ->get();

        return view('showdata', ["weatherdatas" => $weatherdatas, "cityname" => $city_name]);
    }


    public function storeData()
    {   
        $citylist = DB::table('cities')->get();
        foreach ($citylist as $city) {
            $tmp = $this->getCityData($city->name);
            $weatherData = new Weatherdata();
            $weatherData->temp      = $tmp->main->temp;
            $weatherData->dt        = date("Y-m-d H:i:s", $tmp->dt);
            $weatherData->name      = $tmp->name;
            $weatherData->humidity  = $tmp->main->humidity;
            $weatherData->pressure  = $tmp->main->pressure;
            $weatherData->temp_min  = $tmp->main->temp_min;
            $weatherData->temp_max  = $tmp->main->temp_max;
            $weatherData->save();
        }
    }

    private function getCityData($city){
        $api_key = '1077481787381398496a922389d0eea2';
        $url = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=$city&appid=$api_key"; 
        $client = new \GuzzleHttp\Client();
        $res = $client->get($url);
        if ($res->getStatusCode() == 200) {
            $j = $res->getBody();
            $obj = json_decode($j);
            $forecast = $obj;
        }
        return $forecast;
    }
}
