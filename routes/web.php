<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CMSController as AdminCMSController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Redirect /admin -> /admin/login
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    // Admin Authentication Routes
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    });

    Route::middleware('auth:admin')->group(function () {
        // Admin Dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Admin Logout
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        // Change Password
        Route::get('/change-password', [AdminAuthController::class, 'showChangePasswordForm'])->name('change-password');
        Route::post('/change-password', [AdminAuthController::class, 'changePassword'])->name('change-password.update');

        // Team Management
        Route::resource('/team', AdminTeamController::class);

        // CMS Management
        Route::resource('/cms', AdminCMSController::class);

        // Contact Inquiries
        Route::resource('/contact', AdminContactController::class)->only(['index', 'show', 'destroy']);
        Route::post('/contact/{id}/toggle-read', [AdminContactController::class, 'toggleRead'])->name('contact.toggle-read');
    });
});
