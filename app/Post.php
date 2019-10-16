<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;

class Post
{
    public static function getSlug ($directory)
    {
        return preg_split('/\//', $directory)[1];
    }

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
                    'slug' => Post::getSlug($directory),
                ];
            }, $posts);
            return $posts;
        } catch (ParseException $exception) {
            return [];
        }
    }

    public static function get ($slug)
    {
        $Parsedown = new \Parsedown();
        $Parsedown->setMarkupEscaped(true);
        try {
            $locale = config()->get('locale');
            $filename = 'posts/' . $slug . '/' . $locale . '.yaml';
            $post = Storage::get($filename);
            $content = Yaml::parse(Storage::get($filename));
            $content['body'] = array_map(function ($element) use ($Parsedown) {
                if ($element['type'] === 'markdown') {
                    $element['content'] = $Parsedown->text($element['content']);
                } else {
                    return $element;
                }
            }, $content['body']);
            return $content;
        } catch (ParseException $exception) {
            return [];
        }
    }
}
