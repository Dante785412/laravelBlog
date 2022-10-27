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

                                                    // Beim Aufruf von - URL: http://localhost/admin
                                                    // middleware ['auth'] es wird überprüft, ob der User angemeldet ist. Wenn nicht wird der Aufruf auf die Loginseite weitergeleitet.
Route::middleware(['auth'])->group(function(){
                                                    // Prefix: alle Routen bekommen automatisch einen Präfix admin/ vorrangestellt.
                                                    // der Aufruf muss also http://localhost/admin/<Routenname> aussehen.
    Route::prefix('admin')->group(function(){
                                                    // Der name bezieht sich auf den Routennamen, den man z.B. von der Blade aufrufen kann.
                                                    // Diesen wird hier automatisch ein admin. vorrangesetzt. Z.B. admin.index
        Route::name('admin.')->group(function(){
                                                    // Das ist die eigentliche Route, durch middleware, präfix und name ->group sieht das Ergäbnis dann so aus:
                                                    // URL"http://localhost/admin" und der Name"admin.index"
            Route::view('/', 'admin.index')->name('index');
        });
    });
});


Route::resource('/post', PostController::class);

// Wie Route::rerscource
Auth::routes();

// So sehen die Auth::routes(); aus.
// Methode    URL                                       Name
// POST       _ignition/execute-solution ignition.executeSolution › Spatie\LaravelIgnition › ExecuteSolut…
// GET|HEAD   _ignition/health-check ignition.healthCheck › Spatie\LaravelIgnition › HealthCheckController
// POST       _ignition/update-config ignition.updateConfig › Spatie\LaravelIgnition › UpdateConfigContro…
// GET|HEAD   api/user ...................................................................................
// GET|HEAD   login ........................................... login › Auth\LoginController@showLoginForm
// POST       login ........................................................... Auth\LoginController@login
// POST       logout ................................................ logout › Auth\LoginController@logout
// GET|HEAD   password/confirm ......... password.confirm › Auth\ConfirmPasswordController@showConfirmForm
// POST       password/confirm .................................... Auth\ConfirmPasswordController@confirm
// POST       password/email ........... password.email › Auth\ForgotPasswordController@sendResetLinkEmail
// GET|HEAD   password/reset ........ password.request › Auth\ForgotPasswordController@showLinkRequestForm
// POST       password/reset ........................ password.update › Auth\ResetPasswordController@reset
// GET|HEAD   password/reset/{token} ......... password.reset › Auth\ResetPasswordController@showResetForm
// GET|HEAD   register ........................... register › Auth\RegisterController@showRegistrationForm
// POST       register .................................................. Auth\RegisterController@register
// GET|HEAD   sanctum/csrf-cookie ...... sanctum.csrf-cookie › Laravel\Sanctum › CsrfCookieController@show

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
