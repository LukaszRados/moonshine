<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public static function convertFloatToParts ($number)
    {
        $degrees = $number;
        $minutes = ((double)$number - (int)$number) * 60;
        $seconds = (($minutes - (int)$minutes) * 1000);

        return [
            'degrees' => (int)$degrees, 
            'minutes' => (int)$minutes, 
            'seconds' => (int)$seconds,
        ];
    }

    public static function getLatParts ($lat)
    {
        $parts = self::convertFloatToParts($lat);
        $parts['direction'] = $parts['degrees'] >= 0 ? 'N' : 'S';
        return $parts;
    }

    public static function getLngParts ($lng)
    {
        $parts = self::convertFloatToParts($lng);
        $parts['direction'] = $parts['degrees'] >= 0 ? 'E' : 'W';
        return $parts;
    }

    public static function convertPartsToFloat ($parts)
    {
        $result = $parts['degrees'];
        $result += $parts['minutes'] / 60;
        $result += $parts['seconds'] / (60 * 60);
        $result *= ($parts['direction'] === 'S' || $parts['direction'] === 'W') ? -1 : 1;
        return $result;
    }

    public static function convertLat ($lat)
    {
        $converted = self::convertFloatToParts($lat);
        $direction = $converted['degrees'] >= 0 ? 'N' : 'S';
        return $converted['degrees'] . '°' . $converted['minutes'] . "'" . $converted['seconds'] . ' ' . $direction; 
    }

    public static function convertLng ($lng)
    {
        $converted = self::convertFloatToParts($lng);
        $direction = $converted['degrees'] >= 0 ? 'E' : 'W';
        return $converted['degrees'] . '°' . $converted['minutes'] . "'" . $converted['seconds'] . ' ' . $direction; 
    }

    public static function convertToDegrees ($lat, $lng)
    {
        return self::convertLat($lat) . ', ' . self::convertLng($lng);
    }
}
