<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    // Exibe o formulário de redefinição de senha ou processa a atualização
    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.forgot-password'); // Exibe o formulário
        }

        // Validação do e-mail e da nova senha
        $request->validate([
            'email' => 'required|email|exists:users,email', // Verifica se o e-mail existe
            'password' => 'required|string|min:8|confirmed', // A senha precisa ser válida
        ]);

        // Recupera o usuário pelo e-mail
        $user = User::where('email', $request->email)->first();

        // Atualiza a senha do usuário
        $user->password = Hash::make($request->password);
        $user->save();

        // Realiza login do usuário automaticamente após a redefinição da senha
        Auth::login($user);

        // Redireciona para a dashboard ou página inicial
        return redirect()->route('dashboard')->with('status', 'Senha redefinida com sucesso!');
    }
}
