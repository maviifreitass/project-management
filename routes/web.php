<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;

// Rota inicial redireciona para login
Route::get('/', function () {
    return view('auth.login');
});

// Dashboard protegido por autenticação
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rotas protegidas para o perfil do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas para ProjectController
Route::middleware('auth')->group(function () {
    Route::get('/project', function () {
        return view('project');
    })->name('project');

    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project-index', [ProjectController::class, 'index'])->name('project.index');
});

// Rotas protegidas para TaskController
Route::middleware('auth')->group(function () {
    Route::get('/tasks-index', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // Página principal de tarefas
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Criar nova tarefa
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Armazenar tarefa
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show'); // Visualizar tarefa
});

// Rotas protegidas para MemberController
Route::middleware('auth')->group(function () {
    Route::get('/members', [MembersController::class, 'index'])->name('members');
});
Route::get('/members/{id}/edit', [MembersController::class, 'edit'])->name('members.edit');
Route::put('/members/{id}', [MembersController::class, 'update'])->name('members.update');
Route::delete('/members/{id}', [MembersController::class, 'destroy'])->name('members.destroy');

// Importa rotas de autenticação padrão do Laravel Breeze ou Fortify (se estiver usando)
require __DIR__.'/auth.php';


