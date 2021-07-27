<form action="{{route('turma.update')}}" method="POST" class="form_login">
    <p class="msg_erro">{{$errors->has('qtnVagas') ? $errors->first('qtnVagas') : "" }}</p>
    <p class="msg_erro">{{$errors->has('descricao') ? $errors->first('descricao') : "" }}</p>
    <p class="msg_erro">{{$errors->has('professor') ? $errors->first('professor') : "" }}</p>
    <p  class="msg_erro" style="color: rgb(37, 185, 223)">{{ session()->get('mensagem') }}</p>
    @csrf
    {{$turma->id}}
    <input type="hidden" name="id" value="{{$turma->id}}">
    <div class="divisao">
    <label for="label_vagas">Quantidade de vagas</label> <input id="label_vagas" value="{{$turma->quantidade_vagas}}" type="number" name="qtnVagas">
    </div><div class="divisao">
       <label for="label_desc">Descrição</label> <input id="label_desc" value="{{$turma->descricao}}" type="text" name="descricao">
   </div><div class="divisao">
       <label for="label_prof">Professor</label> <input id="label_prof" value="{{$turma->professor}}" type="text" name="professor">
   </div>
    <button type="submit">Alterar</button>
 </form>
 <a href="{{route('turma.visualiza')}}"><button>Voltar</button></a>
 