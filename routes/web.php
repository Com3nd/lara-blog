<?php

use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* MY OWN ROUTES */

Route::get('/', function () {

    return view('posts', [
        'posts' => Post::with('category')->get() //with category is to optimize the query to fix N+1
        // 'posts' will be passed to the view posts.blade.php in resources/view. Ref #1
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) { // post is the parameter of the inputted link: {post}
//    ddd($post);
//  Find a post by its id and pass it to a view called "post"
    return view('post', [
        'post' => $post
    ]);

});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('categories', [
        'posts' => $category->posts
    ]);
});

/* MY OWN ROUTES END */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
