<?php

namespace App\Http\Controllers;

use App\AdicionaTurma;
use App\AdicionaAluno;
use Illuminate\Http\Request;


class AdicionaRegistros extends Controller
{
    public function indexTurma(){
        return view('principais.adicionaTurma');
    }

    public function indexAluno(){
        return view('principais.adicionaAluno');
    }

    public function adicionaTurma(Request $request){
        $turma = new AdicionaTurma();

        $request->validate([
            'professor' => 'min:3',
            'descricao' => 'min:10',
            'qtnVagas' => 'numeric|min:3'
        ],[

            'professor.min' => 'Professor deve ter no mínimo 3 letras',
            'descricao.min' => 'Descrição deve ter no mínimo 10 caracteres',
            'numeric' => 'Quantidade mínima de vagas 3',
            'qtnVagas.min' => 'Quantidade mínima de vagas 3'
        ]);
        
        $turma::create([
            'professor' => $request->input('professor'),
            'descricao' => $request->input('descricao'),
            'quantidade_vagas' => $request->input('qtnVagas')
        ]);

        return redirect()->back()->with('mensagem','Turma adicionada com sucesso');
    }

    public function adicionaAluno(Request $request){
        $aluno = new AdicionaAluno();

        $request->validate([
            'nome' => 'min:3',
            'sexo' => 'required',
            'data' => 'required'
        ],[
            'nome.min' => 'Nome deve ter no mínimo 3 letras',
            'sexo.required' => 'Campo sexo é obrigatório',
            'data.required' => 'Data de nascimento obrigatória'
        ]);
        
        $aluno::create([
            'nome' => $request->input('nome'),
            'sexo' => $request->input('sexo'),
            'nascimento' => $request->input('data'),
            'cidade' => $request->input('cidade'),
            'bairro' => $request->input('bairro'),
            'rua' => $request->input('rua'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento')
        ]);

        return redirect()->back()->with('mensagem','Aluno adicionado(a) com sucesso');
    }
    
}
