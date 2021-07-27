<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdicionaAluno;
use App\AdicionaTurma;

class VisualizaRegistrosController extends Controller
{

    public function index(){
        return view('principais.visualizaHome');
    }

    //Alunos

    public function indexAluno(){
        $alunos = new AdicionaAluno();

        return view('principais.visualizaAluno', ['alunos' => $alunos->all()]);
    }

    public function editaRegistroAluno($id){
        $aluno = new AdicionaAluno();
        $turmas = new AdicionaTurma();
        
        $alunoEditado = $aluno->find($id);

        if(!$alunoEditado)
            return redirect()->back()->with('mensagem',"Aluno inexistente");
    
        return view('principais.editaAluno',['aluno' => $alunoEditado,'turmas' => $turmas->all()]);
    }

    public function updateRegistroAluno(Request $request){
        $aluno = new AdicionaAluno();
        $turma = new AdicionaTurma();
        $alunoUpdate = $aluno->find($request->id);

        if(!$alunoUpdate)
            return redirect()->back()->with('mensagem','Aluno Inexistente');

        $request->validate([
            'nome' => 'min:3'
        ],[
            'nome.min' => 'Nome deve ter no mínimo 3 letras'
        ]);

        //converte uma string para int
        $turmaInt = intval($request->turma);

        if(!$turmaInt)
            $turmaInt = null;

        $alunoUpdate->update([
            'nome' => $request->input('nome'),
            'cidade' => $request->input('cidade'),
            'bairro' => $request->input('bairro'),
            'rua' => $request->input('rua'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
        ]);

        //verifica se a turma esta cheia
        if($turmaInt > 0)
        if($aluno->where('id_turma',$request->turma)->count() >= $turma->find($turmaInt)->quantidade_vagas)
            return redirect()->back()->with('mensagem','Turma cheia, tente outra');  

        $alunoUpdate->id_turma = $turmaInt;
        $alunoUpdate->save();

        return redirect()->back()->with('mensagem','Aluno editado com sucesso');
    }

    public function deletaRegistroAluno($id){
        $aluno = new AdicionaAluno();

        $alunoDeletado = $aluno->find($id);

        if(!$alunoDeletado)
            return redirect()->back()->with('mensagem',"Aluno inexistente");

        $alunoDeletado->delete();

        return redirect()->back()->with('mensagem',"Aluno $id excluído com sucesso");
    }

    //Turmas

    public function indexTurma(){
        $turmas = new AdicionaTurma();

        return view('principais.visualizaTurma', ['turmas' => $turmas->all()]);
    }

    public function deletaRegistroTurma($id){
        $turma = new AdicionaTurma();
        $alunos = new AdicionaAluno();

        $turmaDeletada = $turma->find($id);

        if(!$turmaDeletada)
            return redirect()->back()->with('mensagem',"Turma inexistente");

        //Alunos na turma deletada ficam sem turma
        $alunos->where('id_turma',$id)->update([
            'id_turma' => null
        ]);

        $turmaDeletada->delete();

        return redirect()->back()->with('mensagem',"Turma $id excluída com sucesso");
    }

    public function editaRegistroTurma($id){
        $turmas = new AdicionaTurma();
        
        $turmaEditada = $turmas->find($id);

        if(!$turmaEditada)
            return redirect()->back()->with('mensagem','Aluno Inexistente');
    
        return view('principais.editaTurma',['turma' => $turmaEditada]);
    }

    public function updateRegistroTurma(Request $request){

        $turma = new AdicionaTurma();
        $turmaUpdate = $turma->find($request->id);

        if(!$turmaUpdate)
            return redirect()->back()->with('mensagem','Aluno Inexistente');

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
            
        $turmaUpdate->update([
            'quantidade_vagas' => $request->input('qtnVagas'),
            'descricao' => $request->input('descricao'),
            'professor' => $request->input('professor'),
        ]);

        return redirect()->back()->with('mensagem','Turma editada com sucesso');
    }

    public function indexPersonalizada(){
        return view('principais.visualizaPersonalizada');
    }

    public function pesquisaPersonalizada(Request $request){
        $alunos = new AdicionaAluno();
   

        $aluno = $alunos->where(function ($query) use ($request){

        if($request->id)
            $query->where('id', $request->id);
       
        if($request->nome)
             $query->where('nome', "LIKE", "%{$request->nome}%"); 
        
        if($request->sexo)
            $query->where('sexo',$request->sexo);
            
        if($request->cidade)
             $query->where('cidade', "LIKE", "%{$request->cidade}%"); 
        })->get();

        return view('principais.pesquisaPersonalizadaResultado',['aluno' => $aluno]);
    }
}
