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
            'degrees' => abs((int)$degrees), 
            'minutes' => abs((int)$minutes), 
            'seconds' => abs((int)$seconds),
            'direction' => (int)$degrees >= 0 ? 1 : 0,
        ];
    }

    public static function getLatParts ($lat)
    {
        $parts = self::convertFloatToParts($lat);
        $parts['direction'] = $parts['direction'] ? 'N' : 'S';
        return $parts;
    }

    public static function getLngParts ($lng)
    {
        $parts = self::convertFloatToParts($lng);
        $parts['direction'] = $parts['direction'] ? 'E' : 'W';
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
        return sprintf('%02d', $converted['degrees']) . '°' . sprintf('%02d', $converted['minutes']) . "." . sprintf('%03d', $converted['seconds']) . '\' ' . $direction; 
    }

    public static function convertLng ($lng)
    { //sprintf("%06d", $sum)
        $converted = self::convertFloatToParts($lng);
        $direction = $converted['degrees'] >= 0 ? 'E' : 'W';
        return sprintf('%03d', $converted['degrees']) . '°' . sprintf('%02d', $converted['minutes']) . "." . sprintf('%03d', $converted['seconds']) . '\' ' . $direction; 
    }

    public static function convertToDegrees ($lat, $lng)
    {
        return self::convertLat($lat) . ', ' . self::convertLng($lng);
    }
}
