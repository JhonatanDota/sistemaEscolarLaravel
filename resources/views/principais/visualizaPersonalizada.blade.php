@extends('layout.padrao.basico')

@section('altura', '400px' )
@section('largura', '500px' )
@section('titulo','Visualizar')
@section('h1','Persolizada')

@section('conteudo')
    @component('layout.formularios.formPersonalizada')
    @endcomponent
@endsection