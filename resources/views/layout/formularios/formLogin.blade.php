<form action="{{ route('sistema.login') }}" method="POST" class="form_login">
  <p class="msg_erro">{{$errors->has('usuario') ? $errors->first('usuario') : "" }}</p>
  <p class="msg_erro">{{$errors->has('senha') ? $errors->first('senha') : "" }}</p>
  <p class="msg_erro"> {{session()->get('mensagem')}} </p>
   @csrf
   <div class="divisao">
   <label for="label_usuario">Email</label> <input id="label_usuario" value="{{old('usuario')}}" type="text" name="usuario">
   </div><div class="divisao">
   <label for="label_senha">Senha</label> <input id="label_senha" type="password" name="senha">
   </div>
   <button type="submit">Entrar</button>
   <a href="{{ route('sistema.cadastro') }}">Cadastrar</a>
</form>

