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
    </tr>

@foreach ($aluno as $k)
    <tr>
        <td>{{$k->id}}</td>
        <td>{{$k->nome}}</td>
        <td>{{$k->sexo}}</td>
        <td>{{date('d-m-Y', strtotime($k->nascimento))}}</td>
        <td>{{$k->cidade}}</td>
        <td>{{$k->bairro}}</td>
        <td>{{$k->rua}}</td>
        <td>{{$k->numero}}</td>
        <td>{{$k->complemento}}</td>
        <td>{{$k->id_turma}}</td>
    </tr>
@endforeach
</table>
<a href="{{ route('personalizada.visualiza') }}"><button>Voltar</button></a>
@endsection
