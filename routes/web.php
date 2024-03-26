<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[TaskController::class, 'getAll'] 
)->name("home")->middleware("auth");


Route::get('/login', function () {
    return view('auth.login');
})->name("login");

Route::get('/register', function () {
    return view('auth.register');
})->name("register");


Route::get('/forgot', function () {
    return view('auth.forgot');
})->name("forgot");

Route::post("/login", [UserController::class, 'login'])->name("submit_login");
Route::get("/logout", [UserController::class, 'logout'])->name("logout")->middleware('auth');
Route::post("/register", [UserController::class, 'register'])->name("submit_register");
Route::post("/forgot", function(){})->name("submit_forgot");


Route::post("/",[TaskController::class, 'create'] )->name("submit_task")->middleware('auth');
Route::put("/",[TaskController::class, 'update'] )->name("update_task")->middleware('auth');
Route::get("/delete/{id}",[TaskController::class, 'delete'] )->name("delete_task")->middleware('auth');

Route::get('/profile',[UserController::class, 'getDetails'])->name("profile")->middleware("auth");