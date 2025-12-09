<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/communities', function () {
    return view('communities');
});

Route::get('/profile', function () {
    return view('profile');
});

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





