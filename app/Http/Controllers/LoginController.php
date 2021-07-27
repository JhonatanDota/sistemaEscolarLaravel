<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\LoginUsuario;

class LoginController extends Controller
{
    public function index(){
        return view('principais.login');
    }

    public function login(Request $request){
        $request->validate(
            [
                'usuario' => 'email',
                'senha' => 'required'
            ],
            //msgs de erro
            [
                'email' => 'Digite um email',
                'required' => 'Digite uma senha'
            ]
        );

        $usuariosCadastrados = new LoginUsuario;
        $usuario = $request->input('usuario');
        $senha = $request->input('senha');

        $possui = $usuariosCadastrados->where('email',$usuario)->where('senha',$senha)->first();

        if($possui){
            $tipoAcesso = $possui->tipo_acesso;
            session_start();
            $_SESSION['nome'] = $possui->nome;
            $_SESSION['email'] = $usuario;
            $_SESSION['tipo_acesso'] = $tipoAcesso;
        }
        return redirect()->route('logado.home');
    }

    public function logout(){
        session_destroy();
        return redirect()->route('sistema.login');
    }
}

