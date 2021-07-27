@extends('layout.padrao.basico')

@section('altura', '450px' )

@section('titulo','Editar Turma')
@section('h1','Editar Turma')

@section('conteudo')
@component('layout.formularios.formEditaTurma',['turma' => $turma])
@endcomponent
@endsection


  