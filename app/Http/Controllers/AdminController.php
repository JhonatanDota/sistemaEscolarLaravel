<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginUsuario;

class AdminController extends Controller
{
    public function index(){
        return view('principais.admin');
    }

    public function cadastrados(){
        $cadastrados = new LoginUsuario();
        
        $lista = $cadastrados->all();

        return view('principais.adminCadastrados', ['lista' => $lista]);
    }

    public function deletaCadastrado($id){
        $cadastrados = new LoginUsuario();

        $cadastradoDeleta = $cadastrados->find($id);

        if(!$cadastradoDeleta)
            return redirect()->back()->with('mensagem',"Turma inexistente");

        $cadastradoDeleta->delete();

        return redirect()->back()->with('mensagem',"Cadastro $id excluído com sucesso");
    }

    public function editaCadastrado(Request $request){
        $cadastrados = new LoginUsuario();

        $cadastradoEdita = $cadastrados->find($request->id);

        if(!$cadastradoEdita)
            return redirect()->back()->with('mensagem','Cadastro inexistente');

        $cadastradoEdita->update([
            'tipo_acesso' => $request->input('tipo'),
        ]);

        return redirect()->back()->with('mensagem','Cadastro modificado com sucesso');
    }

}
