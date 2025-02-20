<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        $members = User::all();
        return view('members', compact('members'));
    }
    public function edit($id)
    {
        $member = User::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function destroy($id)
    {
        $member = User::findOrFail($id);
        $member->delete();

        return redirect()->route('members')->with('success', 'Membro excluído com sucesso!');
    }
}