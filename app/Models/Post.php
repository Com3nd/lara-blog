<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public string $title;

    public string $slug;

    public string $excerpt;

    public string $date;

    public string $body;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }


    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path('posts/')))
                ->map(function ($file) {
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function ($document) {
                    return new Post(
                        $document->matter('title'),
                        $document->matter('excerpt'),
                        $document->matter('date'),
                        $document->body(),
                        $document->matter('slug'),
                    );
                }
                )->sortByDesc('date');
            // return is a collection of Post objects.
        });
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
