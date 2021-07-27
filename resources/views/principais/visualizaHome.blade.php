@extends('layout.padrao.basico')

@section('altura', '300px' )
@section('titulo','Visualizar')
@section('h1','Visualizar')

@section('conteudo')
<a href="{{ route('aluno.visualiza') }}"><button>Alunos</button></a>
<a href=" {{ route('turma.visualiza') }} "><button>Turmas</button></a>
<a href=" {{ route('personalizada.visualiza') }} "><button class="btn_maior">Personalizada</button></a>
<a href="{{ route('logado.home') }}"><button>Voltar</button></a>
@endsection


  