<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TaskController;

Route::resource('users', UserController::class);
Route::resource('projects', ProjectController::class);
Route::resource('clients', ClientController::class);
Route::resource('tasks', TaskController::class);

Route::get('/', function () {
    return view('welcome');
});
