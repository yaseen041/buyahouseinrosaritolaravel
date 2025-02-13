<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;



Route::get('/migrate', function () {
    Artisan::call('migrate');
    return 'DONE';
});

Route::get('/changecitything', [HomeController::class, 'changeCityThing']);
Route::get('/consistate', [HomeController::class, 'consistate']);
Route::get('/migrate-refresh', function () {
    Artisan::call('migrate:refresh');
    return 'DONE';
});
Route::get('/migrate-rollback', function () {
    Artisan::call('migrate:rollback');
    return 'DONE';
});


Route::get('/clearcache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    return 'DONE';
});

require 'admin.php';

// Route::get( '/', function () {
//     return redirect()->route('admin.dashboard');
// });

Route::get('/', [HomepageController::class, 'index']);







// Abdul Waheed
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('submit_contact', [ContactController::class, 'submit_contact'])->name('submit_contact');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/{slug}', [BlogController::class, 'handleSlug'])->where('slug', '.*')->name('slugHandler');
