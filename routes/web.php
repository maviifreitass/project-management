<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;

// Rota inicial redireciona para login
Route::get('/', function () {
    return view('auth.login');
});

// Dashboard protegido por autenticação
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Grupo de rotas protegidas para o perfil do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::match(['get', 'post'], '/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');

// Certifique-se de que não há rotas como estas:
Auth::routes(['reset' => false]);


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
    Route::get('/project/{id}/edit', [projectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{id}', [projectController::class, 'update'])->name('project.update');
    Route::delete('/project/{id}', [projectController::class, 'destroy'])->name('project.destroy');
});

// Rotas protegidas para TaskController
Route::middleware('auth')->group(function () {
    Route::get('/tasks-index', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks', [TaskController::class, 'viewAll'])->name('tasks.viewAll');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    // Rotas de edição e atualização
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
});

// Rotas protegidas para MemberController
Route::middleware('auth')->group(function () {
    Route::get('/members', [MembersController::class, 'index'])->name('members');
    Route::get('/members/{id}/edit', [MembersController::class, 'edit'])->name('members.edit');
    Route::put('/members/{id}', [MembersController::class, 'update'])->name('members.update');
    Route::delete('/members/{id}', [MembersController::class, 'destroy'])->name('members.destroy');
});

// Importa rotas de autenticação padrão do Laravel
require __DIR__ . '/auth.php';
