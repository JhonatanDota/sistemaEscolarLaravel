<form action="{{route('aluno.update')}}" method="POST" class="form_login">
    <p class="msg_erro">{{$errors->has('nome') ? $errors->first('nome') : "" }}</p>
    <p  class="msg_erro" style="color: rgb(37, 185, 223)">{{ session()->get('mensagem') }}</p>
    @csrf
    {{$aluno->id}}
    <input type="hidden" name="id" value="{{$aluno->id}}">
    <div class="divisao">
    <label for="label_nome">Nome</label> <input id="label_nome" value="{{$aluno->nome}}" type="text" name="nome">
    </div><div class="divisao">
       <label for="label_cidade">Cidade</label> <input id="label_cidade" value="{{$aluno->cidade}}" type="text" name="cidade">
   </div><div class="divisao">
       <label for="label_rua">Rua</label> <input id="label_rua" value="{{$aluno->rua}}" type="text" name="rua">
   </div><div class="divisao">
       <label for="label_bairro">Bairro</label> <input id="label_bairro" value="{{$aluno->bairro}}" type="text" name="bairro">
   </div><div class="divisao">
       <label for="label_numero">Número</label> <input id="label_numero" value="{{$aluno->numero}}" type="number" name="numero">
   </div><div class="divisao">
       <label for="label_complemento">Complemento</label> <input id="label_complemento" value="{{$aluno->complemento}}" type="text" name="complemento">
   </div>
   <div class="divisao">
    <label for="label_turma">Turma desejada</label>
    <select name="turma" id="label_turma">
        <option value="">Selecione</option>
        @foreach ($turmas as $turma)
            <option value="{{$turma->id}}">{{$turma->id}}</option>
        @endforeach
    </select>
</div>
    <button type="submit">Alterar</button>
 </form>
 <a href="{{route('aluno.visualiza')}}"><button>Voltar</button></a>
 