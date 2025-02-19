<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Exibir todas as tarefas
    public function index()
    {
        // Obtendo todas as tarefas do banco de dados
        $tasks = Task::all();
        
        // Retornando a view e passando as tarefas para ela
        return view('tasks.index', compact('tasks'));
    }

    // Mostrar formulário para criar uma nova tarefa
    public function create()
    {
        // Obtendo todos os projetos e usuários
        $projects = Project::all();
        $users = User::all();

        // Passando os projetos e usuários para a view de criação
        return view('tasks.create', compact('projects', 'users'));
    }

    // Salvar nova tarefa
    public function store(Request $request)
    {
        // Validando os dados recebidos do formulário
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'project_id' => 'required|exists:projects,id', // Validando a existência do projeto
            'user_id' => 'required|exists:users,id', // Validando a existência do usuário
            'due_date' => 'required|date', // Validando a data
        ]);

        // Criando a nova tarefa no banco de dados
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id, // Atribuindo o ID do usuário selecionado
            'project_id' => $request->project_id, // Atribuindo o ID do projeto selecionado
            'due_date' => $request->due_date, // Atribuindo a data de vencimento
        ]);

        // Redirecionando para a página de índice com uma mensagem de sucesso
        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    // Visualizar uma tarefa específica
    public function show(Task $task)
    {
        // Retornando a view para mostrar os detalhes da tarefa
        return view('tasks.show', compact('task'));
    }
}
