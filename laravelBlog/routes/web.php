<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StartPageController;

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

Route::get('/', [StartPageController::class,'index'])->name('home');

// Mit php artisan route:list kann man sich alle Routen anzeigen lassen.
// In der Blade Datei kann man mit @if(!Route::is('admin*')) <code> @endif den Codeblock ein und ausblenden, wenn admin in der URL steht.
// Middleware man muss angemeldet 'auth' sein, um hier einen Zugriff zu haben. Man muss angemeldet sein.
Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::name('admin.')->group(function(){
            Route::view('/', 'admin.index')->name('index');
        });
    });
});


Route::resource('/post', PostController::class);

// Wie Route::rerscource
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
