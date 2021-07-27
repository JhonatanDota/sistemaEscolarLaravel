<form action="{{ route('turma.registro') }}" method="POST" class="form_login">
  <p class="msg_erro">{{$errors->has('professor') ? $errors->first('professor') : "" }}</p>
  <p class="msg_erro">{{$errors->has('descricao') ? $errors->first('descricao') : "" }}</p>
  <p class="msg_erro">{{$errors->has('qtnVagas') ? $errors->first('qtnVagas') : "" }}</p>
  <p  class="msg_erro" style="color: rgb(37, 185, 223)">{{ session()->get('mensagem') }}</p>
   @csrf
   <div class="divisao">
   <label for="label_prof">Professor(a)</label> <input id="label_prof" value="{{old('professor')}}" type="text" name="professor">
   </div><div class="divisao">
   <label for="label_desc">Descrição</label> <input id="label_desc" value="{{old('descricao')}}" type="text" name="descricao">
   </div><div class="divisao">
    <label for="label_vag">Quantidade de Vagas</label> <input id="label_vag" value="{{old('qtnVagas')}}" type="number" name="qtnVagas">
  </div>
   <button type="submit">Inserir</button>
</form>
<a href="{{route('logado.home')}}"><button>Voltar</button></a>
