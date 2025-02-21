<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    // Método para exibir todos os projetos
    public function index()
    {
        // Recupera todos os projetos
        $projects = Project::all();

        // Retorna a view com os projetos
        return view('project.index', compact('projects'));
    }

    // Método para criar um novo projeto
    public function store(Request $request)
    {
        // Validação dos dados de entrada
        $dados = $request->validate([
            'name' => 'required|string|max:255',  // Valida o nome como string, com tamanho máximo
            'description' => 'required|string',  // Valida a descrição como string
        ]);

        // Limpeza dos dados de entrada, removendo tags HTML maliciosas
        $dados['name'] = strip_tags($dados['name']);
        $dados['description'] = strip_tags($dados['description']);

        // Criação do projeto usando o Eloquent ORM (protege contra SQL Injection)
        Project::create($dados);

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('project.index')->with('success', 'Projeto criado com sucesso!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $projects = Project::all();
        return view('project.index', compact('project', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $dados = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $project = Project::findOrFail($id);
        $project->update($dados);

        return redirect()->route('project.index')->with('success', 'Projeto atualizado com sucesso!');
    }

    // Método para excluir um projeto
    public function destroy($id)
    {
        // Busca o projeto pelo ID
        $project = Project::findOrFail($id);

        // Exclui o projeto
        $project->delete();

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('project.index')->with('success', 'Projeto excluído com sucesso!');
    }

    // Método para buscar um projeto com proteção contra SQL Injection (usando Query Builder)
    public function search(Request $request)
    {
        // Busca o projeto pelo nome, com proteção contra SQL Injection usando Query Builder
        $produto = DB::table('projects')
            ->where('name', $request->input('name')) // Protege contra SQL Injection
            ->first();

        // Retorna o produto encontrado ou uma mensagem de erro
        if ($produto) {
            return view('project.show', compact('produto'));
        } else {
            return redirect()->route('project.index')->with('error', 'Projeto não encontrado.');
        }
    }
}
