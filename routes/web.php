<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

//login
Route::get('/', [UserController::class, 'showlogin'])->name('loginform');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//Admin Dashboard
Route::get('/admin.dashboard', [UserController::class, 'viewAdmin'])->name('admin.dashboard');
Route::get('/admin.developer', [UserController::class, 'viewAdmin_dev'])->name('admin.developer');
Route::get('/admin.client', [UserController::class, 'viewAdmin_client'])->name('admin.client');
Route::get('/admin.project', [ProjectController::class, 'viewAdmin_project'])->name('admin.project');
Route::post('/store', [ProjectController::class, 'store'])->name('project.store');

//Developer Dashboard
Route::get('/developer.dashboard', [ProjectController::class, 'viewdev_project'])->name('developer.dashboard');
Route::post('/project-status/{id}', [ProjectController::class,'updateStatus'])->name('project.status.update');
Route::post('/project-update/{id}', [ProjectController::class,'storeUpdate'])->name('project.update.store');
Route::post('/developerstore', [ProjectController::class, 'developerstore'])->name('project.developerstore');

//Client Dashboard
Route::get('/client.dashboard', [ProjectController::class, 'viewClient'])->name('client.dashboard');
Route::post('/clientstore', [ProjectController::class, 'clientstore'])->name('project.clientstore');

