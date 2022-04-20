<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\songController as UsersongController;
use App\Http\Controllers\Admin\songController as AdminsongController;
use App\Http\Controllers\User\PlaylistController as UserPlaylistController;
use App\Http\Controllers\Admin\PlaylistController as AdminPlaylistController;
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

Route::post('count', function (Request $request) {
    return response()->json([
        'message' => $request->message,
    ]);
});

Route::get('/Playlist', [LoginController::class, 'login']);
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

Route::get('/user/songs/', [UserPlaylistController::class, 'index'])->name('user.songs.index');
Route::get('/user/songs/create', [UserPlaylistController::class, 'create'])->name('user.songs.create');
Route::get('/user/songs/{id}', [UserPlaylistController::class, 'show'])->name('user.songs.show');
Route::post('/user/songs/store', [UserPlaylistController::class, 'store'])->name('user.songs.store');
Route::get('/user/songs/{id}/edit', [UserPlaylistController::class, 'edit'])->name('user.songs.edit');
Route::put('user/songs/{id}', [UserPlaylistController::class, 'update'])->name('user.songs.update');
Route::delete('user/songs/{id}', [UserPlaylistController::class, 'destroy'])->name('user.songs.destroy');

Route::get('/user/songs/playlist', [UserPlaylistController::class, 'index'])->name('user.songs.playlist');

Route::get('/admin/songs/playlist', [AdminPlaylistController::class, 'index'])->name('admin.playlists.playlist');

Route::get('/admin/songs/', [AdminsongController::class, 'index'])->name('admin.songs.index');
Route::get('/admin/songs/create', [AdminsongController::class, 'create'])->name('admin.songs.create');
Route::get('/admin/songs/{id}', [AdminsongController::class, 'show'])->name('admin.songs.show');
Route::post('/admin/songs/store', [AdminsongController::class, 'store'])->name('admin.songs.store');
Route::get('/admin/songs/{id}/edit', [AdminsongController::class, 'edit'])->name('admin.songs.edit');
Route::put('admin/songs/{id}', [AdminsongController::class, 'update'])->name('admin.songs.update');
Route::delete('admin/songs/{id}', [AdminsongController::class, 'destroy'])->name('admin.songs.destroy');