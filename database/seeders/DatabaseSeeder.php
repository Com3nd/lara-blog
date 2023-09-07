<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $hobby = Category::create([
            'name' => 'Hobby',
            'slug' => 'hobby'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$family->id,
            'title'=>'My Family Post',
            'slug'=>'my-family-post',
            'excer pt'=>'This is my post excerpt',
            'body'=>'This is the body for my post which always should be much bigger and longer than the excerpt'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$personal->id,
            'title'=>'My Personal Post',
            'slug'=>'my-personal-post',
            'excerpt'=>'This is my post excerpt',
            'body'=>'This is the body for my post which always should be much bigger and longer than the excerpt'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$hobby->id,
            'title'=>'My hobby Post',
            'slug'=>'my-hobby-post',
            'excerpt'=>'This is my post excerpt',
            'body'=>'This is the body for my post which always should be much bigger and longer than the excerpt'
        ]);
    }
}
