<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;

class PagesController extends Controller
{
    public function index()
    {
        $previews = Post::previews();
        return view('pages.index', [ 'previews' => $previews ]);
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
        return view('pages.route');
    }
    
    public function contact()
    {
        return view('pages.contact');
    }
}
