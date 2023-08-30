<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function all()
    {
        $files = File::files(resource_path('posts/'));

        return array_map(function ($file) { // Returns each file of posts folder and its content.
            return $file->getContents();
        }, $files);
        // return is an array of strings.
    }

    public static function find($slug)
    {
        // Checking if the file we are looking for exists
        //                       vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        // Caches the file for 20 minutes, allowing the for quick access for the content of the file
        // without the machine looking for the directory every time.
        return cache()->remember("post.{$slug}", now()->addMinutes(20), function () use ($path) {
            return file_get_contents($path);
        });
    }
}
