<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\ContactRequestController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\NeighborhoodController;
use App\Http\Controllers\Admin\PropertyListingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EvaluationController;
use App\Http\Controllers\Admin\HtaccessController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\TourController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'  =>  'admin'], function () {
	Route::get('login', [AdminLoginController::class, 'index'])->name('login');
	Route::post('verify_login', [AdminLoginController::class, 'verify_login']);
	Route::get('logout', [AdminLoginController::class, 'logout']);

	Route::group(['middleware' => ['auth:admin']], function () {

		Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
		Route::get('admin', [AdminController::class, 'index']);
		Route::get('change_password', [AdminController::class, 'change_password']);
		Route::post('update_password', [AdminController::class, 'update_password']);

		// Route::group(['prefix'  =>  'users'], function () {
		// 	Route::get('/', [UserController::class, 'index']);
		// 	Route::get('/add', [UserController::class, 'add']);
		// 	Route::post('/store', [UserController::class, 'store']);
		// 	Route::post('/update', [UserController::class, 'update']);
		// 	Route::post('update_statuses', [UserController::class, 'update_statuses']);
		// 	Route::post('delete', [UserController::class, 'delete']);
		// 	Route::get('detail/{id}', [UserController::class, 'user_details']);
		// });
		Route::group(['prefix'  =>  'features'], function () {
			Route::get('/', [FeatureController::class, 'index']);
			Route::post('/store', [FeatureController::class, 'store']);
			Route::post('/feature-show', [FeatureController::class, 'show']);
			Route::post('/update-feature', [FeatureController::class, 'update']);
			Route::post('/delete', [FeatureController::class, 'delete']);
		});
		Route::group(['prefix'  =>  'types'], function () {
			Route::get('/', [TypeController::class, 'index']);
			Route::post('/store', [TypeController::class, 'store']);
			Route::post('/type-show', [TypeController::class, 'show']);
			Route::post('/update-type', [TypeController::class, 'update']);
			Route::post('/delete', [TypeController::class, 'delete']);
		});
		Route::group(['prefix'  =>  'testimonials'], function () {
			Route::get('/', [TestimonialController::class, 'index']);
			Route::post('/store', [TestimonialController::class, 'store']);
			Route::post('/show', [TestimonialController::class, 'show']);
			Route::post('/update', [TestimonialController::class, 'update']);
			Route::post('/delete', [TestimonialController::class, 'delete']);
		});
		Route::group(['prefix'  =>  'htaccess'], function () {
			Route::get('/', [HtaccessController::class, 'index']);
			Route::get('/sitemap', [HtaccessController::class, 'genSitemap']);
			Route::post('/store', [HtaccessController::class, 'store']);
			Route::post('/show', [HtaccessController::class, 'show']);
			Route::post('/update', [HtaccessController::class, 'update']);
			Route::post('/delete', [HtaccessController::class, 'delete']);
		});
		Route::group(['prefix'  =>  'contact'], function () {
			Route::get('/', [ContactRequestController::class, 'index']);
			Route::post('/show', [ContactRequestController::class, 'show']);
			Route::post('/delete', [ContactRequestController::class, 'delete']);
		});
		Route::group(['prefix'  =>  'tour'], function () {
			Route::get('/', [TourController::class, 'index']);
			Route::post('/show', [TourController::class, 'show']);
			Route::post('/delete', [TourController::class, 'delete']);
		});
		Route::group(['prefix'  =>  'newsletter'], function () {
			Route::get('/', [NewsletterController::class, 'index']);
			Route::get('/export_csv', [NewsletterController::class, 'exportCSV']);
			Route::get('/export_json', [NewsletterController::class, 'exportJSON']);
			Route::post('/delete', [NewsletterController::class, 'delete']);
		});
		Route::group(['prefix'  =>  'cities'], function () {
			Route::get('/', [CitiesController::class, 'index']);
			Route::get('/add', [CitiesController::class, 'add']);
			Route::get('/edit/{id}', [CitiesController::class, 'edit']);
			Route::post('/store', [CitiesController::class, 'store']);
			Route::post('/show', [CitiesController::class, 'show']);
			Route::post('/update', [CitiesController::class, 'update']);
			Route::post('/delete', [CitiesController::class, 'delete']);
		});
		Route::group(['prefix'  =>  '/seo'], function () {
			Route::get('/', [SeoController::class, 'index'])->name('admin.seo');
			Route::get('/create', [SeoController::class, 'create'])->name('admin.seo.create');
			Route::post('/store', [SeoController::class, 'store'])->name('admin.seo.store');
			Route::get('edit/{id}', [SeoController::class, 'show'])->name('admin.seo.edit');
			Route::post('/update', [SeoController::class, 'update'])->name('admin.seo.update');
			Route::post('/delete', [SeoController::class, 'delete'])->name('admin.seo.delete');
		});
		Route::group(['prefix'  =>  'agents'], function () {
			Route::get('/', [AgentController::class, 'index']);
			Route::post('/store', [AgentController::class, 'store']);
			Route::post('/show', [AgentController::class, 'show']);
			Route::post('/update', [AgentController::class, 'update']);
			Route::post('/delete', [AgentController::class, 'delete']);
		});
		// Route::group(['prefix'  =>  'evaluations'], function () {
		// 	Route::get('/', [EvaluationController::class, 'index']);
		// 	Route::get('/details/{id}', [EvaluationController::class, 'show']);
		// 	Route::post('/update', [EvaluationController::class, 'update']);
		// 	Route::post('/delete', [EvaluationController::class, 'delete']);
		// });
		Route::group(['prefix'  =>  'communities'], function () {
			Route::get('/', [NeighborhoodController::class, 'index']);
			Route::post('/newSlug', [NeighborhoodController::class, 'newSlug']);
			Route::get('/add', [NeighborhoodController::class, 'add']);
			Route::post('/store', [NeighborhoodController::class, 'store']);
			Route::post('/delete-image', [NeighborhoodController::class, 'deleteImage']);
			Route::get('/details/{id}', [NeighborhoodController::class, 'show']);
			Route::post('/update', [NeighborhoodController::class, 'update']);
			Route::post('/delete', [NeighborhoodController::class, 'delete']);
			Route::post('/imageManagement', [NeighborhoodController::class, 'imageManagement']);
			Route::post('/addCity', [NeighborhoodController::class, 'addCity']);
		});
		Route::group(['prefix'  =>  'property-listings'], function () {
			Route::get('/', [PropertyListingController::class, 'index']);
			Route::get('/add', [PropertyListingController::class, 'add']);
			Route::post('/store', [PropertyListingController::class, 'store']);
			Route::get('/details/{id}', [PropertyListingController::class, 'show']);
			Route::post('/update', [PropertyListingController::class, 'update']);
			Route::post('/updateFeatureStatus', [PropertyListingController::class, 'updateFeatureStatus']);
			Route::post('/delete', [PropertyListingController::class, 'delete']);
			Route::post('/imageManagement', [PropertyListingController::class, 'imageManagement']);
			Route::post('/delete-image', [PropertyListingController::class, 'deleteImage']);
			Route::post('/delete-file', [PropertyListingController::class, 'deleteFile']);
		});
		Route::group(['prefix'  =>  'categories'], function () {
			Route::get('/', [CategoriesController::class, 'index']);
			Route::post('/store', [CategoriesController::class, 'store']);
			Route::post('/show', [CategoriesController::class, 'show']);
			Route::post('/update', [CategoriesController::class, 'update']);
			Route::post('/delete', [CategoriesController::class, 'delete']);
		});

		Route::group(['prefix'  =>  '/blogs'], function () {
			Route::get('/', [BlogsController::class, 'index'])->name('admin.blogs');
			Route::get('/create', [BlogsController::class, 'create'])->name('admin.blogs.create');
			Route::post('/store', [BlogsController::class, 'store'])->name('admin.blogs.store');
			Route::get('edit/{id}', [BlogsController::class, 'show'])->name('admin.blogs.edit');
			Route::post('/update', [BlogsController::class, 'update'])->name('admin.blogs.update');
			Route::post('/delete', [BlogsController::class, 'delete'])->name('admin.blogs.delete');
		});

		Route::post('/ckeditor-upload', [AdminController::class, 'ckeditor_upload'])->name('ckeditor-upload');
	});
});
