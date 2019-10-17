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

    public static function getBackground ($slug)
    {
        return asset('img/posts/' . $slug . '/bg.jpg');
    }

    public static function all ()
    {
        try {
            $posts = Storage::directories('posts'); 
            $locale = config()->get('locale');
            $posts = array_map(function ($directory) use ($locale) {
                $filename = $directory . '/' . $locale . '.yaml';
                $content = Yaml::parse(Storage::get($filename));
                $slug = Post::getSlug($directory);
                return [
                    'title' => $content['title'],
                    'published' => $content['published'],
                    'slug' => $slug,
                    'background' => self::getBackground($slug),
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
            $path = 'posts/' . $slug . '/';
            $filename = $path . $locale . '.yaml';
            $post = Storage::get($filename);
            $content = Yaml::parse(Storage::get($filename));
            $content['body'] = array_map(function ($element) use ($Parsedown, $path) {
                switch ($element['type']) {
                    case 'markdown':
                        $element['content'] = $Parsedown->text($element['content']);
                    break;

                    case 'photo':
                        $element['src'] = asset('img/' . $path . $element['src']);
                    break;
                }
                return $element;
                if ($element['type'] === 'markdown') {
                    return $element;
                } else if ($element['type']) {
                    return $element;
                }
            }, $content['body']);
            $content['background'] = self::getBackground($slug);
            return $content;
        } catch (ParseException $exception) {
            return [];
        }
    }
}
