<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Post::all()->reverse();
        return view('videos.index', [ 'videos' => $videos ]);
    }

    public function show($slug)
    {
        // $post = Post::get($slug);
        // return view('posts.show', [ 'post' => $post ]);
    }
}
