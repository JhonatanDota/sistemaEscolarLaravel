@extends('layout.padrao.basico')

@section('altura', '650px' )
@section('titulo','Editar Aluno')
@section('h1','Edita Aluno')

@section('conteudo')
@component('layout.formularios.formEditaAluno',['aluno' => $aluno, 'turmas' => $turmas])
@endcomponent
@endsection


  