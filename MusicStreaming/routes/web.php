<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\MusicController as UserMusicController;
use App\Http\Controllers\Admin\MusicController as AdminMusicController;
use App\Models\Song;

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
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/profile', [ProfileController::class, 'DisplayProfile']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/user/musics/', [UserMusicController::class, 'index'])->name('user.musics.index');
Route::get('/user/musics/{id}', [UserMusicController::class, 'show'])->name('user.musics.show');

Route::get('/admin/musics/', [AdminMusicController::class, 'index'])->name('admin.musics.index');
Route::get('/admin/musics/create', [AdminMusicController::class, 'create'])->name('admin.musics.create');
Route::get('/admin/musics/{id}', [AdminMusicController::class, 'show'])->name('admin.musics.show');
Route::post('/admin/musics/store', [AdminMusicController::class, 'store'])->name('admin.musics.store');
Route::get('/admin/musics/{id}/edit', [AdminMusicController::class, 'edit'])->name('admin.musics.edit');
Route::put('admin/musics/{id}', [AdminMusicController::class, 'update'])->name('admin.musics.update');
Route::delete('admin/musics/{id}', [AdminMusicController::class, 'destroy'])->name('admin.musics.destroy');