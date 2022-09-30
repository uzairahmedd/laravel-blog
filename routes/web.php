<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// customer / general public view. But it will have CRUD option for those blogs which are written by authentiacted users.
Route::get('/', [BlogController::class, 'index'])->name('home'); 

// All blogs of authenticated author
Route::get('my-blog', [BlogController::class, 'my_blogs'])->name('blog.my');
Route::resource('blog', BlogController::class);
Route::post('blog/{blog}/comment', [BlogController::class, 'comment'])->name('comment');

require __DIR__.'/auth.php';
