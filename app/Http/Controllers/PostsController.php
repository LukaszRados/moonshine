<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all()->reverse();
        return view('posts.index', [ 'posts' => $posts ]);
    }

    public function show($slug)
    {
        $post = Post::get($slug);
        // $previews = Post::previews($slug);
        // return view('posts.show', [ 'post' => $post, 'previews' => $previews ]);
        return view('posts.show', [ 'post' => $post ]);
    }
}
