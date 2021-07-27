@extends('layout.padrao.basico')

@section('altura', '300px' )
@section('titulo','Relatorios')
@section('h1','Relatorios')

@section('conteudo')
<a href="{{ route('relatorio.alunos') }}" target="blake"><button>Alunos</button></a>
<a href=" {{ route('relatorio.turmas') }}" target="blake"><button>Turmas</button></a>

<form action="{{route('relatorioDeterminada.turmas')}}" target="blank" method="POST">
    @csrf
    <input class="input_menor" type="number" name="id">
    <button type="submit">Turma</button>
</form>

<a href="{{ route('logado.home') }}"><button>Voltar</button></a>
@endsection


  