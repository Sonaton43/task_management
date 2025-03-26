<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

Route::get('/',[AuthController::class, 'login'])->name('login');
Route::post('/login check',[AuthController::class, 'login_check'])->name('login_check');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/signup',[AuthController::class, 'signup'])->name('signup');
Route::post('/signup/account',[AuthController::class, 'sign_up'])->name('sign_up');
Route::get('/profile',[AuthController::class, 'profile'])->name('profile');

Route::group(['middleware' => ['manager', 'teammate']], function(){

    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');

    //This is Users Routes
    Route::get('/user/index',[UsersController::class, 'index'])->name('user.index');
    Route::get('/user/create',[UsersController::class, 'create'])->name('user.create');
    Route::post('/user/store',[UsersController::class, 'store'])->name('user.store');
    Route::get('/user/edit{token}',[UsersController::class, 'edit'])->name('user.edit');
    Route::post('/user/update',[UsersController::class, 'update'])->name('user.update');
    Route::get('/user/delete{token}',[UsersController::class, 'delete'])->name('user.delete');

    //This is Projects Routes
    Route::get('/project/index',[ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/create',[ProjectController::class, 'create'])->name('project.create');
    Route::post('/project/store',[ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/edit{token}',[ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/project/update',[ProjectController::class, 'update'])->name('project.update');
    Route::get('/project/delete{token}',[ProjectController::class, 'delete'])->name('project.delete');

    //This is Tasks Routes
    Route::get('/tasks/index',[TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create',[TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store',[TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/edit{token}',[TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/tasks/update',[TaskController::class, 'update'])->name('tasks.update');
    Route::get('/tasks/status',[TaskController::class, 'status'])->name('tasks.status');
    Route::get('/tasks/delete{token}',[TaskController::class, 'delete'])->name('tasks.delete');

});

