<?php

use App\Http\Controllers\API\AgentController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CatgeoryController;
use App\Http\Controllers\API\CitiesController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\EvaluationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserAuthController;
use App\Http\Controllers\API\FeaturesController;
use App\Http\Controllers\API\NeighborhoodsController;
use App\Http\Controllers\API\NewsletterSubsController;
use App\Http\Controllers\API\PropertiesController;
use App\Http\Controllers\API\SearchController;
use App\Http\Controllers\API\SEOController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\TourController;
use App\Http\Controllers\API\TypesController;

Route::group(['middleware' => 'api'], function ($router) {

    // Auth Routes
    // Route::post('login', [UserAuthController::class, 'login']);
    // Route::post('logout', [UserAuthController::class, 'logout']);
    // Route::post('refresh', [UserAuthController::class, 'refresh']);
    // Route::get('me', [UserAuthController::class, 'user_profile']);

    Route::group(['prefix' => 'features'], function () {
        Route::get('all', [FeaturesController::class, 'index']);
        Route::get('details/{id}', [FeaturesController::class, 'show']);
    });
    Route::group(['prefix' => 'neighborhoods'], function () {
        Route::get('all', [NeighborhoodsController::class, 'index']);
        Route::get('page/{slug}', [NeighborhoodsController::class, 'show']);
    });
    Route::group(['prefix' => 'types'], function () {
        Route::get('all', [TypesController::class, 'index']);
        Route::get('details/{id}', [TypesController::class, 'show']);
    });
    Route::group(['prefix' => 'testimonials'], function () {
        Route::get('all', [TestimonialController::class, 'index']);
        Route::get('details/{id}', [TestimonialController::class, 'show']);
    });
    Route::group(['prefix' => 'cities'], function () {
        Route::get('all', [CitiesController::class, 'index']);
        Route::get('mostcount', [CitiesController::class, 'mostListingsCountCities']);
        Route::get('page/{slug}', [CitiesController::class, 'show']);
        Route::get('search', [CitiesController::class, 'search']);
        Route::get('neighborhoods/{city_id}', [CitiesController::class, 'neighborhoods']);
    });
    Route::group(['prefix' => 'seo'], function () {
        Route::get('/{slug}', [SEOController::class, 'index']);
    });
    Route::group(['prefix' => 'agents'], function () {
        Route::get('all', [AgentController::class, 'index']);
        Route::get('three', [AgentController::class, 'three']);
        Route::get('details/{id}', [AgentController::class, 'show']);
    });
    Route::group(['prefix' => 'properties'], function () {
        Route::get('featured', [PropertiesController::class, 'featured']);
        Route::get('recent', [PropertiesController::class, 'recent']);
        Route::get('recentforrent', [PropertiesController::class, 'recentforrent']);
        Route::get('recentforsale', [PropertiesController::class, 'recentforsale']);
        Route::get('bestdeals', [PropertiesController::class, 'bestdeals']);
        Route::get('filters', [PropertiesController::class, 'filters']);
        Route::post('all-filtered', [PropertiesController::class, 'all']);
        Route::post('all-city-filtered', [PropertiesController::class, 'allWithCities']);
        Route::get('all-neighborhood/{id}', [PropertiesController::class, 'allWithNeighbor']);
        Route::get('details/{id}', [PropertiesController::class, 'show']);
        Route::get('detailswithslug/{slug}', [PropertiesController::class, 'detailswithslug']);
    });
    Route::group(['prefix' => 'search'], function () {
        Route::get('/input-options', [SearchController::class, 'input']);
        Route::get('/saved', [SearchController::class, 'savedSearches']);
        Route::post('/submit', [SearchController::class, 'index']);
        Route::get('/search-results/{id}', [SearchController::class, 'savedSearchResults']);
    });
    // Route::group(['prefix' => 'evaluation'], function () {
    //     Route::get('/input-options', [EvaluationController::class, 'inputs']);
    //     Route::post('/submit', [EvaluationController::class, 'store']);
    // });
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/property-options', [ContactController::class, 'inputs']);
        Route::post('/submit', [ContactController::class, 'index']);
    });
    Route::group(['prefix' => 'tour'], function () {
        Route::post('/submit', [TourController::class, 'index']);
    });
    Route::group(['prefix' => 'newsletter'], function () {
        Route::post('/submit', [NewsletterSubsController::class, 'store']);
    });
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CatgeoryController::class, 'index']);
        Route::get('/show/{id}', [CatgeoryController::class, 'show']);
    });
    Route::group(['prefix' => 'blogs'], function () {
        Route::get('/', [BlogController::class, 'index']);
        Route::get('/category/{id}', [BlogController::class, 'categorySearch']);        
        Route::get('/category-withslug/{slug}', [BlogController::class, 'categorySearchSlug']);
        Route::get('/show/{id}', [BlogController::class, 'show']);
        Route::post('/fetchblog', [BlogController::class, 'fetchblog']);
    });
    
    Route::group(['prefix' => 'disabled-crawl-urls'], function () {
        Route::get('/', [BlogController::class, 'discrawlblogs']);
    });

});
