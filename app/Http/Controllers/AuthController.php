<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email'    => 'O email precisa ser um endereço válido.',
            'email.unique'   => 'O email informado já está em uso.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min'   => 'A senha deve ter pelo menos 6 caracteres.',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect('/login')->with('success', 'Cadastro realizado com sucesso!');
    }
    


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
    
        return back()->with('error', 'As credenciais fornecidas não correspondem aos nossos registros.');
    }
    public function showLoginForm()
{
    return view('auth.login'); 
}

    

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
