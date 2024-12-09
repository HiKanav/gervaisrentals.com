<?php

namespace App\Helpers;

class Helper
{
    public static function fetchUserLocation($ipaddress)
    {
        try {
            $json = file_get_contents("http://ipinfo.io/$ipaddress/geo?token=" .  config('services.ipinfo.token'));
            
            return json_decode($json, true);
        } catch (\Exception $e) { 
            return [];
        }
    }
}