@extends('layout.padrao.basico')

@section('altura', '500px' )
@section('largura', '1200px' )
@section('titulo','Visualizar')
@section('h1','')

@section('conteudo')
<table cellspacing="5" border="1" >
    <tr>
        <th>Matricula</th>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Data Nascimento</th>
        <th>Cidade</th>
        <th>Bairro</th>
        <th>Rua</th>
        <th>Número</th>
        <th>Complemento</th>
        <th>Turma</th>
        <th>Opções</th>
    </tr>

@foreach ($alunos as $aluno)
    <tr>
        <td>{{$aluno->id}}</td>
        <td>{{$aluno->nome}}</td>
        <td>{{$aluno->sexo}}</td>
        <td>{{date('d-m-Y', strtotime($aluno->nascimento))}}</td>
        <td>{{$aluno->cidade}}</td>
        <td>{{$aluno->bairro}}</td>
        <td>{{$aluno->rua}}</td>
        <td>{{$aluno->numero}}</td>
        <td>{{$aluno->complemento}}</td>
        <td>{{$aluno->id_turma}}</td>
        @if ($_SESSION['tipo_acesso'] != 3)
        <td class="td_lado">
            <a href="{{route('aluno.edita',$aluno->id)}}"><img class="opcoes_img" src="{{ asset('imgs/editar.png')}}" alt=""></a> 
            <a href="{{route('aluno.deleta',$aluno->id)}}" onclick="return deletar()"><img class="opcoes_img" src="{{ asset('imgs/deletar.png')}}" alt=""></a>
        </td>
        @endif
    </tr>
@endforeach
</table>
<p class="msg_erro msg_table" style="color: rgb(37, 185, 223)"> {{session()->get('mensagem') }} </p>
<a href="{{ route('menu.visualiza') }}"><button>Voltar</button></a>
@endsection
