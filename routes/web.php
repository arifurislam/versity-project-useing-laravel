<?php
use Illuminate\Support\Facades\Route;


// website controllers
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\WebsiteTeacherController;
use App\Http\Controllers\Website\WebsiteFacultyController;
use App\Http\Controllers\Website\WebsiteGalleryController;
use App\Http\Controllers\Website\WebsiteClubController;
use App\Http\Controllers\Website\WebsiteNewsController;
use App\Http\Controllers\Website\WebsiteVideoController;

// backend controllers
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\FutureController;


// front-end routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/store', [ContactController::class, 'store']);
Route::get('/teachers', [WebsiteTeacherController::class, 'index']);
Route::get('/teachers/{slug}', [WebsiteTeacherController::class, 'show']);
Route::get('/faculties', [WebsiteFacultyController::class, 'index']);
Route::get('/faculties/{slug}', [WebsiteFacultyController::class, 'show']);
Route::get('/gallery/photos', [WebsiteGalleryController::class, 'index']);
Route::get('/gallery/photos/details', [WebsiteGalleryController::class, 'show']);
Route::get('/clubs', [WebsiteClubController::class, 'index']);
Route::get('/news', [WebsiteNewsController::class, 'index']);
Route::get('/news/{slug}', [WebsiteNewsController::class, 'show']);
Route::get('/videos', [WebsiteVideoController::class, 'index']);

// admin routes
Route::group(['as'=>'admin.', 'prefix' => 'admin', 'middleware'=>'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/users', UserController::class);
    Route::resource('/teachers', TeacherController::class);
    Route::resource('/departments', DepartmentController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/future', FutureController::class);
    Route::get('/contact', [AdminContactController::class, 'index']);
    Route::get('/contact/{id}', [AdminContactController::class, 'show']);
    Route::delete('/contact/{id}', [AdminContactController::class, 'delete']);
    
    // Route::resource('/tags', TagController::class)->except([
    //     'show'
    // ]);



});


require __DIR__.'/auth.php';
