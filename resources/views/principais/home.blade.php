@extends('layout.padrao.basico')

@section('titulo','Home')
@section('h1','Registros')
@section('conteudo')
    {{session()->get('mensagem')}}
    <ul class="lista">
        <li> <a href="{{ route('turma.index') }}"><button class="btn_lista">Adicionar Turma</button></a></li>
        <li> <a href=" {{ route('aluno.index') }}"><button class="btn_lista">Adicionar Aluno</button></li></a>
        <li> <a href=" {{ route('menu.visualiza') }} "><button class="btn_lista btn_visualiza">Visualizar Registros</button></a></li>
        <li> <a href="{{ route('relatorio.index')}}"><button class="btn_maior">Relatorios</button></a></li>
        @if ($_SESSION['tipo_acesso'] == 1)
            <li><a href="{{route('admin.index')}}"><button style="color: red">Admin</button></a></li>
        @endif
        <li class="btn_sair btn_info"><a href=" {{ route('logado.info') }}"><button>Info</button></a> </li>
        <li class="btn_sair"><a href=" {{ route('logado.logout') }}"><button>Sair</button></a> </li>
        <li class="acesso">Acesso: <span class="tipo">
            @if ($_SESSION['tipo_acesso'] == 1)
                Admin TI
            @elseif($_SESSION['tipo_acesso'] == 2)
                Admin Sistema
            @else
                Operador
            @endif
            </span>
    </li>
    </ul>
@endsection



