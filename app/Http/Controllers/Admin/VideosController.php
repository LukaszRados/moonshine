<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Video;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('created_at', 'DESC')->get();
        return view('admin.videos.index', [ 'videos' => $videos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new Video();
        $video->is_published = $request->input('is_published') ? 1 : 0;
        $video->slug = $request->input('slug');
        $video->url = $request->input('url');
        $video->title_pl = $request->input('title_pl');
        $video->title_en = $request->input('title_en');
        $video->description_pl = $request->input('description_pl');
        $video->description_en = $request->input('description_en');
        $video->save();

        \Image::make($request->file('photo'))->save(public_path() . '/videos/' . $video->slug . '.jpg');

        return redirect()->route('admin.videos.create')->with('status', 'Video "' . $video->title_en . '" added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::where('id', $id)->firstOrFail();
        return view('admin.videos.edit', [ 'video' => $video ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::where('id', $id)->firstOrFail();
        $video->is_published = $request->input('is_published') ? 1 : 0;
        $video->url = $request->input('url');
        $video->title_pl = $request->input('title_pl');
        $video->description_pl = $request->input('description_pl');
        $video->title_en = $request->input('title_en');
        $video->description_en = $request->input('description_en');
        $video->save();

        if ($request->has('photo')) {
            \Image::make($request->file('photo'))->save(public_path() . '/videos/' . $video->slug . '.jpg');
        }

        return redirect()->route('admin.videos.index')->with('status', 'Video "' . $video->title_en . '" updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::where('id', $id)->firstOrFail();
        Video::destroy($id);
        return redirect()->route('admin.videos.index')->with('status', 'Video removed.');
    }
}
