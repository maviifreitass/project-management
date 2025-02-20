<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;

class DashboardController extends Controller
{
    // Exibir todas as tarefas
    public function index()
    {
        // Obtendo os dados do banco
        $tasks = Task::all();
        $projects = Project::all();
        $users = User::all();
    
        // Retornando a view e passando os dados
        return view('dashboard', compact('tasks', 'projects', 'users'));
    }
}
