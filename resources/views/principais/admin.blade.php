@extends('layout.padrao.basico')

@section('titulo','Admin')
@section('h1','Home')
@section('conteudo')
    <ul class="lista">
        <li> <a href="{{ route('admin.cadastrados') }}"><button class="btn_lista">Designar Acesso</button></a></li>
        
        <li class="btn_sair"><a href=" {{ route('logado.home') }}"><button>Voltar</button></a> </li>
    </ul>
@endsection



