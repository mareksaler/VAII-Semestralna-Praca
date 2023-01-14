<?php

use App\Http\Controllers\FinnishedHikeController;
use App\Http\Controllers\HikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::resource('/hikes', HikeController::class);
Route::get('/hikes/{category_id}', [HikeController::class, 'index']);
// Route::get('/hikes', [HikeControlle::class, 'index'])->name('hikes.index');
// Route::get('/hikes/create', [HikeControlle::class, 'create'])->name('hikes.create');
// Route::post('/hikes', [HikeControlle::class, 'store'])->name('hikes.store');
// Route::get('/hikes/{hike}', [HikeControlle::class, 'show'])->name('hikes.show');
// Route::get('/hikes/{hike}/edit', [HikeControlle::class, 'edit'])->name('hikes.edit');
// Route::put('/hikes/{hike}', [HikeControlle::class, 'update'])->name('hikes.update');
// Route::delete('/hikes/{hike}', [HikeControlle::class, 'destroy'])->name('hikes.destroy');

// Route::resource('/finnished-hikes', FinnishedHikeController::class);
Route::get('/finnished-hikes/{hike}', [FinnishedHikeController::class, 'store'])->name('finnished-hikes.store');
Route::delete('/finnished-hikes/{hike}', [FinnishedHikeController::class, 'destroy'])->name('finnished-hikes.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
