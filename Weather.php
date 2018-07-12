<?php
/**
 * Created by PhpStorm.
 * User: s.byadretdinov
 * Date: 18.12.2017
 * Time: 18:52
 */
use GuzzleHttp\Client;

class Weather{
    protected $token = '';

    public function getWeather($lat, $lon){
        $url = 'api.openweathermap.org/data/2.5/weather';
        $params = [];
        $params['lat'] = $lat;
        $params['lon'] = $lon;
        $params['APPID'] = $this->token;

        $url .= "?" . http_build_query($params);
        $client = new Client([
            'base_uri' => $url
        ]);

        $result = $client->request('GET');
        return json_decode($result->getBody());
    }
}