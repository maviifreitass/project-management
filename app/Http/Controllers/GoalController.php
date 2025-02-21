<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    // Exibe a lista de metas
    public function index()
    {
        $goals = Goal::all(); // Pega todas as metas
        return view('goals.index', compact('goals'));
    }

    // Exibe o formulário para criar uma nova meta
    public function create()
    {
        return view('goals.create');
    }

    // Armazena uma nova meta
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        Goal::create($request->all());
        return redirect()->route('goals.index')->with('success', 'Meta criada com sucesso!');
    }

    // Exibe o formulário para editar uma meta existente
    public function edit($id)
    {
        $goal = Goal::findOrFail($id);
        return view('goals.edit', compact('goal'));
    }

    // Atualiza a meta existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        $goal = Goal::findOrFail($id);
        $goal->update($request->all());
        return redirect()->route('goals.edit')->with('success', 'Meta atualizada com sucesso!');
    }

    // Deleta uma meta
    public function destroy($id)
    {
        $goal = Goal::findOrFail($id);
        $goal->delete();
        return redirect()->route('goals.index')->with('success', 'Meta excluída com sucesso!');
    }
}
