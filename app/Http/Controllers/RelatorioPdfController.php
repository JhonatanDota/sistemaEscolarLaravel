<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\AdicionaAluno;
use \App\AdicionaTurma;
use PDF;

class RelatorioPdfController extends Controller
{
    public function index(){
        return view('principais.relatorioIndex');
    }

    public function criaRelatorioAlunos(){
        $alunos = new AdicionaAluno();

        $alunos = $alunos->all();

        $pdf = PDF::loadView('layout.relatorios.alunos',['alunos' => $alunos]);

        return $pdf->setPaper('a4')->stream('Alunos.pdf');
    }

    public function criaRelatorioTurmas(){
        $turmas = new AdicionaTurma();

        $turmas = $turmas->all();

        $pdf = PDF::loadView('layout.relatorios.turmas',['turmas' => $turmas]);

        return $pdf->setPaper('a4')->stream('Turmas.pdf');
    }

    public function criaRelatorioDeterminadaTurma(Request $request){
        $turmas = new AdicionaTurma();
        $alunosTurma = new AdicionaAluno();

        $turma = $turmas->where('id',$request->id)->get();
        
        if(!$turma)
            return redirect()->back()->with('Turma inexistente');
        
        $alunos = $alunosTurma->where('id_turma',$request->id)->get();

        $pdf = PDF::loadView('layout.relatorios.alunos',['alunos' => $alunos, 'id' => $request->id]);

        return $pdf->setPaper('a4')->stream('Turma.pdf');
    }
}
