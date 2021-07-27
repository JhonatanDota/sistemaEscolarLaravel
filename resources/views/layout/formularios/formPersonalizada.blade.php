<form action="{{ route('personalizada.pesquisa') }}" method="POST" class="form_login">
     @csrf
     <div class="divisao">
        <label for="label_mat">Matricula</label> <input class="input_menor" id="label_mat" type="number" name="id">
        </div>
     <div class="divisao">
     <label for="label_nome">Nome</label> <input id="label_nome" type="text" name="nome">
     </div>
    <div class="divisao">
      <label for="label_sexo">Sexo</label> <select id="label_sexo" name="sexo">
            <option value="">Selecione</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="O">Outro</option>
      </select>
    </div><div class="divisao">
        <label for="label_cidade">Cidade</label> <input id="label_cidade" type="text" name="cidade">
    </div>
     <button class="btn_maior" type="submit">Pesquisar</button>
  </form>
  <a href="{{route('logado.home')}}"><button>Voltar</button></a>
  