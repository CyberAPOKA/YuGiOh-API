<?php

use App\Http\Controllers\YuGiOhController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TesteController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('my-cards', [YuGiOhController::class, 'myCards'])->name('my.cards');
    Route::get('decks', [YuGiOhController::class, 'decks'])->name('decks');
    Route::get('deck/{slug}', [YuGiOhController::class, 'deck'])
        ->where('slug', '[a-zA-Z0-9-]+')
        ->name('deck');

    Route::get('drag', [TesteController::class, 'drag'])->name('drag');
});

Route::get('cards', [YuGiOhController::class, 'cards'])->name('cards');
