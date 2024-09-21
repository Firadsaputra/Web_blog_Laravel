<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact"
    ]);
});

Route::get('/posts', function () {

    // penggunaan eager loading untuk menyelesaikan masalah N+1 Problem dengan with(), sedangkan 'author' adalah method yang ada di dalam model Post
    // $posts = Post::latest()->get();

    // $posts = Post::with(['author', 'category'])->latest()->get();
    // dump(request('seacrh'));

    // Kode ini untuk menampilkan halaman blog yang dicari di pencarian, merujukke title. search merujuk pada atibute name didalam input
    // $posts = Post::latest();
    // if (request('search')) {
    //     $posts->where('title', 'like', '%' . request('search') . '%');
    // }
    // 'posts' => $posts->get() -> taro di dalam return

    return view(
        'posts',

        // all() mengambil semua data yang ada di model Post
        // ['title' => 'Blog', 'posts' => Post::all()]

        // get() sama seperti all() hanya saja dia bisa dikombinasikan dengan kondisi pengambilan data tertenu seperti latest()
        // $posts = Post::latest()->get()

        [
            'title' => 'Blog List',
            // filter() merujuk ke dalam method yang ada didalam Model\Post yang bernama scopeFilter
            // search merujuk ke method get yang membalikan ke rute semula, sedangkan category untuk melakukan pencarian pada halaman posts/category
            // 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->get()
            // method get() diatas berfungsi mengambil semua data

            // paginate() berfungsiuntukmembatasi data yang tampil dilayar tambahkan kofigurasi di views nya
            'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(5)->withQueryString(),
        ]

    );
});



// Route model binding, defaultnya dari $post adalah $id, untuk menggunakan selain id untuk menjadi primary key yang dicarioleh rute tambahkan ':' deidepan 'post'contohnya seperti dibawah Route::get('posts/{post:slug}'
Route::get('posts/{post:slug}', function (Post $post) {

    // $post = Post::find($slug);

    return view('post', ['title' => 'Singel Post', 'post' => $post]);
});



Route::get('/authors/{user:username}', function (User $user) {
    // penggunaan lazy eager loading
    // $posts = $user->posts->load('category', 'author');
    // ['title' => count($posts) . ' Post Creat by ' . $user->name, 'posts' => $posts]


    // Menggunakan defaul teager loading yang berada dalam model post yan
    return view(
        'posts',
        ['title' => count($user->posts) . ' Post Creat by ' . $user->name, 'posts' => $user->posts]

    );
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // penggunaan lazy eager loading
    // $posts = $category->posts->load('author', 'category')



    // Menggunakan default eager loading
    return view(
        'posts',
        ['title' => count($category->posts) . ' Blog with Category : ' . $category->name, 'posts' => $category->posts]
    );
});
