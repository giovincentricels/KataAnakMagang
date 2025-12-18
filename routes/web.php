<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommunityPostController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route::get('/communities', function () {
//     return view('communities');
// });

Route::get('/communities', [CommunityPostController::class, 'index'])
    ->name('communities.index');

Route::post('/communities', [CommunityPostController::class, 'store'])
    ->middleware('auth')
    ->name('communities.store');

Route::delete('/communities/{post}', [CommunityPostController::class, 'destroy'])
    ->middleware('auth')
    ->name('communities.destroy');

// Route::get('/profile', function () {
//     return view('profile');
// });

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/salaries', function () {
    return view('salaries');
});

Route::get('/companies', function () {
    return view('companies');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/salaries', [SalaryController::class, 'index'])
    ->name('salaries.index');

Route::post('/salaries', [SalaryController::class, 'store'])
    ->middleware('auth')
    ->name('salaries.store');

// Companies
Route::get('/companies', [CompanyController::class, 'index'])
    ->name('companies.index');

Route::get('/companies/{company}', [CompanyController::class, 'show'])
    ->middleware('auth')
    ->name('companies.show');

// Reviews (auth required)
Route::middleware('auth')->group(function () {
    Route::post('/companies/{company}/reviews', [CompanyReviewController::class, 'store'])
        ->name('reviews.store');

    Route::delete('/reviews/{review}', [CompanyReviewController::class, 'destroy'])
        ->name('reviews.destroy');
});
