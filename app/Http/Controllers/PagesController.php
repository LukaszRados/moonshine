<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Point;
use App\Video;

class PagesController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('pages.index', [ 'videos' => $videos ]);
    }
    
    public function crew()
    {
        return view('pages.crew');
    }
    
    public function boat()
    {
        return view('pages.boat');
    }
    
    public function route()
    {
        $points = Point::orderBy('created_at', 'ASC')->get();
        $currentPosition = $points[$points->count() - 1];
        $coordinates = Point::convertToDegrees($currentPosition->lat, $currentPosition->lng);
        return view('pages.route', [ 'points' => $points, 'current_position' => $currentPosition, 'coordinates' => $coordinates ]);
    }
    
    public function contact()
    {
        $currentPosition = Point::orderBy('created_at', 'DESC')->first();
        $coordinates = Point::convertToDegrees($currentPosition->lat, $currentPosition->lng);
        return view('pages.contact', [ 'current_position' => $currentPosition, 'coordinates' => $coordinates ]);
    }
}
