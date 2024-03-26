<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home")->middleware("auth");

Route::get('/profile', function () {
    return view('profile');
})->name("profile")->middleware("auth");

Route::get('/login', function () {
    return view('auth.login');
})->name("login");

Route::get('/register', function () {
    return view('auth.register');
})->name("register");


Route::get('/forgot', function () {
    return view('auth.forgot');
})->name("forgot");

Route::post("/login", function(){})->name("submit_login");
Route::post("/register", function(){})->name("submit_register");
Route::post("/forgot", function(){})->name("submit_forgot");