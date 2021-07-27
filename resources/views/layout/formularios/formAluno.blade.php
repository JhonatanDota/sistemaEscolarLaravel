<form action="{{ route('aluno.registro') }}" method="POST" class="form_login">
    <p class="msg_erro">{{$errors->has('nome') ? $errors->first('nome') : "" }}</p>
    <p class="msg_erro">{{$errors->has('data') ? $errors->first('data') : "" }}</p>
    <p class="msg_erro">{{$errors->has('sexo') ? $errors->first('sexo') : "" }}</p>
    <p  class="msg_erro" style="color: rgb(37, 185, 223)">{{ session()->get('mensagem') }}</p>
     @csrf
     <div class="divisao">
     <label for="label_nome">Nome</label> <input id="label_nome" value="{{old('nome')}}" type="text" name="nome">
     </div><div class="divisao">
     <label for="label_data">Data Nascimento</label> <input id="label_data" value="{{old('data')}}" type="date" min='1900-01-01' max='2030-12-10' name="data">
     </div><div class="divisao">
      <label for="label_sexo">Sexo</label> <select id="label_sexo" name="sexo">
            <option value="">Selecione</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="O">Outro</option>
      </select>
    </div><div class="divisao">
        <label for="label_cidade">Cidade</label> <input id="label_cidade" value="{{old('cidade')}}" type="text" name="cidade">
    </div><div class="divisao">
        <label for="label_rua">Rua</label> <input id="label_rua" value="{{old('rua')}}" type="text" name="rua">
    </div><div class="divisao">
        <label for="label_bairro">Bairro</label> <input id="label_bairro" value="{{old('bairro')}}" type="text" name="bairro">
    </div><div class="divisao">
        <label for="label_numero">Número</label> <input id="label_numero" value="{{old('numero')}}" type="number" name="numero">
    </div><div class="divisao">
        <label for="label_complemento">Complemento</label> <input id="label_complemento" value="{{old('complemento')}}" type="text" name="complemento">
    </div>
     <button type="submit">Inserir</button>
  </form>
  <a href="{{route('logado.home')}}"><button>Voltar</button></a>
  