<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SpecializationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

// Account group
Route::group(['prefix' => 'account'], function () {
    // Guest Routes
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', [AuthController::class, 'registration'])->name('account.registration');
        Route::post('/process-registration', [AuthController::class, 'processRegistration'])->name('account.processRegistration');
        Route::get('/login', [AuthController::class, 'login'])->name('account.login');
        Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('account.authenticate');
    });

    // Auth Routes
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('account.logout');
    });
});

// Admin Routes
Route::group(['prefix' => 'admin'], function () {

    // Guest Middleware
    Route::group(['middleware' => 'admin.guest'], function () {

        Route::get('/login', [AdminAuthController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminAuthController::class, 'authenticate'])->name('admin.authenticate');
    });

    // Authenticate Middleware
    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');

        // Slug Route
        // Route::get('/getSlug', function (Request $request) {
        //     $slug = '';
        //     if (!empty($request->title)) {
        //         $slug = Str::slug($request->title);
        //     }

        //     return response()->json([
        //         'status' => true,
        //         'slug' => $slug
        //     ]);
        // })->name('getSlug');
    });
});
