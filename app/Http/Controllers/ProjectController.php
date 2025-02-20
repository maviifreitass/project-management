<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects')); 
    }
    

    public function store(Request $request)
    {
        $dados = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Project::create($dados);
        return redirect()->route('project')->with('success', 'Projeto criado com sucesso!');

    }

    public function destroy($id)
    {
        $member = Project::findOrFail($id);
        $member->delete();

        return redirect()->route('project.index')->with('success', 'Projeto excluído com sucesso!');
    }
}
