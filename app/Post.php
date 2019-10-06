<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;

class Post
{
    public static function all ()
    {
        try {
            $posts = Storage::directories('posts'); 
            $locale = config()->get('locale');
            $posts = array_map(function ($directory) use ($locale) {
                $filename = $directory . '/' . $locale . '.yaml';
                $content = Yaml::parse(Storage::get($filename));
                return [
                    'title' => $content['title'],
                    'published' => $content['published'],
                    'body' => $content['body'],
                ];
            }, $posts);
            return $posts;
        } catch (ParseException $exception) {
            return [];
        }
    }
}
