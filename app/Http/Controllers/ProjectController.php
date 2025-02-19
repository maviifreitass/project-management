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
        return redirect()->route('dashboard')->with('success', 'Projeto criado com sucesso!');

    }
}
