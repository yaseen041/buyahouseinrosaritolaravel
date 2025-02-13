<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\BlogController;



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

Route::get('/', [HomepageController::class, 'index']);
Route::get('/properties', [PropertiesController::class, 'index']);


// Abdul Waheed
Route::group(['prefix'  =>  '/blog'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog');
});
Route::get('blog-details/{url}', [BlogController::class, 'blog_details']);
Route::get('blog-details/cate/{url}', [BlogController::class, 'blog_details']);