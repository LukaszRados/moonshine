<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
    
    public function crew()
    {
        return view('pages.crew');
    }
    
    public function boat()
    {
        return view('pages.boat');
    }
    
    public function contact()
    {
        return view('pages.contact');
    }
}
