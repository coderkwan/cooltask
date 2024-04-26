<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/login', function () {
    return view('auth.login');
})->name("login");

Route::get('/register', function () {
    return view('auth.register');
})->name("register");

Route::get("/about", function(){
    return view('about');
});

Route::post("/login", [UserController::class, 'login'])->name("submit_login");
Route::get("/logout", [UserController::class, 'logout'])->name("logout")->middleware('auth');
Route::post("/register", [UserController::class, 'register'])->name("submit_register");
Route::get('/profile',[UserController::class, 'getDetails'])->name("profile")->middleware("auth");
Route::post('/profile/detele',[UserController::class, 'delete'])->name("delete_profile")->middleware("auth");
Route::put('/profile/edit',[UserController::class, 'update'])->name("update_profile")->middleware("auth");

Route::get('/',[TaskController::class, 'getAll'])->name("home")->middleware("auth");
Route::post("/create",[TaskController::class, 'create'] )->name("submit_task")->middleware('auth');
Route::post("/",[TaskController::class, 'search'] )->name("search")->middleware('auth');
Route::put("/",[TaskController::class, 'update'] )->name("update_task")->middleware('auth');
Route::get("/delete/{id}",[TaskController::class, 'delete'] )->name("delete_task")->middleware('auth');
