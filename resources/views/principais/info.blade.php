@extends('layout.padrao.basico')

@section('titulo','Info')
@section('h1','Info')

@section('conteudo')
<h2>Operador</h2>
<p class="info">Tem acesso a relatórios e inserção de alunos e turmas</p>

<h2>Admin Sistema</h2>
<p class="info">Tem as permissões de um operador além de excluir e editar registros</p>

<h2>Admin TI</h2>
<p class="info">Tem todas permissões além de poder alterar acesso de outros cadastrados</p>

<a href="{{ route('logado.home') }}"><button>Voltar</button></a>
@endsection

