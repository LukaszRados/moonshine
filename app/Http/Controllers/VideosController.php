<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Video;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Video::all()->reverse();
        return view('videos.index', [ 'videos' => $videos ]);
    }

    public function show($slug)
    {
        $video = Video::where('slug', $slug)->firstOrFail();
        return view('videos.show', [ 'video' => $video ]);
    }
}
