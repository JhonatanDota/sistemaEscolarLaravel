@extends('layout.padrao.basico')

@section('altura', '500px' )
@section('largura', '750px' )
@section('titulo','Visualizar')
@section('h1','')

@section('conteudo')
<h1>Cadastrados</h1>
<table cellspacing="5" border="1" >
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>email</th>
        <th>Tipo Acesso</th>
        <th>Modificar Acesso</th>
        <th>Opções</th>
    </tr>

@foreach ($lista as $cadastro)
    <tr>
        <td>{{$cadastro->id}}</td>
        <td>{{$cadastro->nome}}</td>
        <td>{{$cadastro->email}}</td>
        <td>{{$cadastro->tipo_acesso}}</td>
        <td>
            <form action="{{route('admin.edita')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$cadastro->id}}">
            @if($cadastro->email != 'admin@admin.com')
            <select name="tipo" >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <button type="submit">Mudar</button>
            @endif
        </form>
        <td class="td_lado">
           @if($cadastro->email != 'admin@admin.com')
           <a href="{{ route('admin.deleta',$cadastro->id) }}" onclick="return deletar()"><img class="opcoes_img" src="{{ asset('imgs/deletar.png')}}" alt=""></a>
           @endif
        </td>
    </tr>
@endforeach
</table>
<p class="msg_erro msg_table" style="color: rgb(37, 185, 223)"> {{session()->get('mensagem') }} </p>
<a href="{{ route('admin.index') }}"><button>Voltar</button></a>
@endsection

