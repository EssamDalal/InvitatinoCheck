<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\InvitedController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\RegisteredController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');

// });

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

// localazition Route

Route::get('locale/{lange}', [LocalizationController::class, 'setLang']);

Route::post('registered/confirm', [RegisteredController::class, 'store'])->name('store');

Route::group(['middleware' => 'auth', 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('invited', InvitedController::class);
    Route::resource('registered', RegisteredController::class);
    Route::controller(RegisteredController::class)->group(function () {
        // Route::get('users', 'index');
        Route::get('registered-export', 'export')->name('registered.export');
        // Route::post('users-import', 'import')->name('users.import');
    });
});
