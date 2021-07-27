<form action="{{ route('sistema.cadastro') }}" method="POST" class="form_login">
    <p class="msg_erro">{{$errors->has('nome') ? $errors->first('nome') : "" }}</p>
    <p class="msg_erro">{{$errors->has('usuario') ? $errors->first('usuario') : "" }}</p>
    <p class="msg_erro">{{$errors->has('confirm_usuario') ? $errors->first('confirm_usuario') : "" }}</p>
    <p class="msg_erro">{{$errors->has('senha') ? $errors->first('senha') : "" }}</p>
    <p class="msg_erro">{{$errors->has('confirm_senha') ? $errors->first('confirm_senha') : "" }}</p>
    <p class="msg_erro"> {{session()->get('mensagem')}} </p>
    <p class="msg_erro" style="color: rgb(37, 185, 223)"> {{session()->get('mensagemSucesso')}} </p>
     @csrf
     <div class="divisao">
        <label for="label_nome">Nome</label> <input value="{{old('nome')}}" id="label_nome" type="text" name="nome">

     <label for="label_usuario">Email</label> <input value="{{old('usuario')}}"  id="label_usuario" type="text" name="usuario">
     <label for="label_usuario">Confime o Email</label> <input value="{{old('confirm_usuario')}}" id="label_usuario" type="text" name="confirm_usuario">

     <label for="label_senha">Senha</label> <input value="{{old('senha')}}" id="label_senha" type="password" name="senha">
     <label for="label_senha">Confirme a Senha</label> <input id="label_senha" type="password" name="confirm_senha">
     </div>
     <button type="submit">Entrar</button>
  </form>
  <a href="{{ route('sistema.login') }}"><button>Voltar</button></a>