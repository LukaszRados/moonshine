<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public static function convertNumber ($number)
    {
        $degrees = $number;
        $minutes = ((double)$number - (int)$number) * 60;
        $seconds = (($minutes - (int)$minutes) * 1000);

        return [
            'degrees' => (int)$degrees, 
            'minutes' => (int)$minutes, 
            'seconds' => (int)$seconds
        ];
    }
    public static function convertLat ($lat)
    {
        $converted = self::convertNumber($lat);
        $direction = $converted['degrees'] >= 0 ? 'N' : 'S';
        return $converted['degrees'] . '°' . $converted['minutes'] . "'" . $converted['seconds'] . ' ' . $direction; 
    }

    public static function convertLng ($lng)
    {
        $converted = self::convertNumber($lng);
        $direction = $converted['degrees'] >= 0 ? 'E' : 'W';
        return $converted['degrees'] . '°' . $converted['minutes'] . "'" . $converted['seconds'] . ' ' . $direction; 
    }

    public static function convertToDegrees ($lat, $lng)
    {
        return self::convertLat($lat) . ', ' . self::convertLng($lng);
    }
}
