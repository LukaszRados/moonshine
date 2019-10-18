<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;

class Post
{
    public static function getSlugAndDate ($directory)
    {
        $slugAndDate = preg_split('/\//', $directory)[1];
        $separated = preg_split('/_/', $slugAndDate);
        return [
            'original' => $slugAndDate,
            'date' => $separated[0],
            'slug' => $separated[1],
        ];
    }

    public static function getBackground ($slug)
    {
        return asset('img/posts/' . $slug . '/bg.jpg');
    }

    public static function getThumb ($slug)
    {
        return asset('img/posts/' . $slug . '/thumb.jpg');
    }

    public static function list ()
    {
        $posts = Storage::directories('posts');
        return collect(array_map(function ($item) {
            return self::getSlugAndDate($item);
        }, $posts))->reverse();
    }

    public static function all ()
    {
        try {
            $posts = Storage::directories('posts');
            $locale = config()->get('locale');
            $posts = array_map(function ($directory) use ($locale) {
                $filename = $directory . '/' . $locale . '.yaml';
                $content = Yaml::parse(Storage::get($filename));
                $slugAndDate = Post::getSlugAndDate($directory);
                return [
                    'title' => $content['title'],
                    'published' => $slugAndDate['date'],
                    'published_text' => $content['published_text'],
                    'intro' => $content['intro'],
                    'slug' => $slugAndDate['slug'],
                    'thumb' => self::getThumb($slugAndDate['slug']),
                ];
            }, $posts);
            return collect($posts);
        } catch (ParseException $exception) {
            return collect([]);
        }
    }

    public static function previews ($exclude_slug = null)
    {
        $posts = self::list()->where('slug', '!=', $exclude_slug)->take(3);
        $locale = config()->get('locale');
        return $posts->map(function ($item) use ($locale) {
            $content = Yaml::parse(Storage::get('posts/' . $item['original'] . '/' . $locale . '.yaml'));
            $content['thumb'] = self::getThumb($item['slug']);
            $content['slug'] = $item['slug'];
            return $content;
        });
    }

    public static function get ($slug)
    {
        $post = self::list()->where('slug', $slug)->first();
        $Parsedown = new \Parsedown();
        $Parsedown->setMarkupEscaped(true);
        try {
            $locale = config()->get('locale');
            $content = Yaml::parse(Storage::get('posts/' . $post['original'] . '/' . $locale . '.yaml'));
            $content['body'] = array_map(function ($element) use ($Parsedown, $slug) {
                switch ($element['type']) {
                    case 'markdown':
                        $element['content'] = $Parsedown->text($element['content']);
                    break;

                    case 'photo':
                        $element['src'] = asset('img/posts/' . $slug . '/' . $element['src']);
                    break;
                }
                return $element;
            }, $content['body']);
            $content['background'] = self::getBackground($slug);
            return $content;
        } catch (ParseException $exception) {
            return [];
        }
    }
}
