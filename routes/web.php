<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\User_PostController;
use App\Http\Controllers\ChatController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/index', [GoodsController::class, 'show'])->name('index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/posts', [User_PostController::class, 'index'])->name('posts');
    Route::get('/posts/{post}', [User_PostController::class, 'show']);
    //ルーティングが同じだと後ろを参照してしまう。
    Route::get('/chat/{product}', [ChatController::class, 'openChat']);
});



require __DIR__.'/auth.php';

Route::prefix('shop')->name('shop.')->group(function(){

    Route::get('/dashboard', function () {
        return view('shop.dashboard');
    })->middleware(['auth:shop'])->name('dashboard');
    
    Route::controller(ProductController::class)->middleware(['auth:shop'])->group(function(){
        // Route::get('/', 'index');
        Route::post('/products', 'store');
        Route::get('/products/create', 'create')->name('products.create');
        Route::get('/products/{product}', 'show');
        Route::put('/products/{product}', 'update');
        Route::delete('/products/{product}', 'delete');
        Route::get('/products/{product}/edit', 'edit');
        //同じルーティングの時はメソッドが違うので注意
        //{ルートパラメータ}を使うときは後ろの方の行でないと巻き込み事故が起こる。
    });

    Route::prefix('/post')->name('post.')->controller(PostController::class)->middleware(['auth:shop'])->group(function(){
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store');
    });
        

    require __DIR__.'/shop.php';
});