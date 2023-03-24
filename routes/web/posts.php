<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/posts', function () {
    return view('posts', [
        'posts' => Post::latest('updated_at')->with(['category', 'author'])->get()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) { 

    return view('post', [
        'post' => $post,
    ]);

});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});