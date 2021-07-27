<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\LoginUsuario;
use Illuminate\Validation\Rule;

class CadastroController extends Controller
{
    public function index(){
        return view('principais.cadastro');
    }

    public function cadastro(Request $request){
        $usuario = new LoginUsuario;
        $usuario_confirm = $request->get('confirm_usuario');
        $senha_confirm = $request->get('confirm_senha');

        $request->validate(
            [   
                'nome' => 'min:3',
                'usuario' => ['email', Rule::in([$usuario_confirm])],
                'confirm_usuario'=>'required',
                'senha' => ['min:8', Rule::in([$senha_confirm])],
                'confirm_senha' => 'required'
            ],
            //msgs de erro
            [   
                'usuario.in' => 'Emails não coincidem',
                'senha.in' => 'Senhas não coincidem',
                'nome.min' => 'Nome deve ter no mínimo 3 letras',
                'confirm_usuario.required' => 'Confirme o email',
                'confirm_senha.required' => 'Confirme a senha',
                'email' => 'Digite um email',
                'required' => 'Digite uma senha',
                'senha.min' => 'Senha deve conter no mínino 8 caracteres'
            ]
        );
        
        $checagem = $usuario->where('email',$request->input('usuario'))->get()->first();

        if($checagem){
            return redirect()->back()->with('mensagem','Email já cadastrado');
        }

        LoginUsuario::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('usuario'),
            'senha' => $request->input('senha')
        ]);

        return redirect()->back()->with('mensagemSucesso','Cadastrado com sucesso');
    }
}