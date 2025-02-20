<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Exibir todas as tarefas, incluindo a lógica para edição
    public function index(Request $request)
    {
        // Obtendo os dados do banco
        $tasks = Task::all();
        $projects = Project::all();
        $users = User::all();
        $editTask = null;

        // Verifica se foi passado um ID para edição via query string
        if ($request->has('id')) {
            $editTask = Task::find($request->id);
        }

        // Retornando a view e passando os dados
        return view('tasks.index', compact('tasks', 'projects', 'users', 'editTask'));
    }

    // Exibir todas as tarefas na página viewAll
    public function viewAll()
    {
        $tasks = Task::all();
        $projects = Project::all();
        $users = User::all();

        return view('tasks.tasks', compact('tasks', 'projects', 'users'));
    }

    // Salvar ou atualizar uma tarefa
    public function store(Request $request)
    {
        // Validando os dados recebidos do formulário
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'due_date' => 'required|date',
        ]);

        // Se o ID for passado, atualiza a tarefa existente
        if ($request->id) {
            $task = Task::findOrFail($request->id);
            $task->update($request->all());
            return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
        }

        // Criando nova tarefa
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}
