@extends('layout.padrao.basico')

@section('altura', '500px' )
@section('largura', '600px' )
@section('titulo','Visualizar')
@section('h1','')

@section('conteudo')
<table cellspacing="5" border="1" >
    <tr>
        <th>Turma</th>
        <th>Vagas</th>
        <th>Descrição</th>
        <th>Professor</th>
        <th>Opções</th>
    </tr>

@foreach ($turmas as $turma)
    <tr>
        <td>{{$turma->id}}</td>
        <td>{{$turma->quantidade_vagas}}</td>
        <td>{{$turma->descricao}}</td>
        <td>{{$turma->professor}}</td>
        @if ($_SESSION['tipo_acesso'] != 3)
        <td class="td_lado">
            <a href="{{ route('turma.edita',$turma->id) }}"><img class="opcoes_img" src="{{ asset('imgs/editar.png')}}" alt=""></a> 
            <a href="{{ route('turma.deleta',$turma->id) }}" onclick="return deletar()"><img class="opcoes_img" src="{{ asset('imgs/deletar.png')}}" alt=""></a>
        </td>
        @endif
    </tr>
@endforeach
</table>
<p class="msg_erro msg_table" style="color: rgb(37, 185, 223)"> {{session()->get('mensagem') }} </p>
<a href="{{ route('menu.visualiza') }}"><button>Voltar</button></a>
@endsection

