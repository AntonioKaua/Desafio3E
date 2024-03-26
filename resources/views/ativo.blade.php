<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif


  <header>
    @auth

    <div class="nav-item">
      <form action="/logout" method="post">
        @csrf
        <a href="/logout" class="text-center" onclick="event.preventDefault();
    this.closest('form').submit();"><button class="btn btn-danger">Logout</button></a>
      </form>
    </div>

    @endauth

    <h1 class="text-center">Tabela de ativos</h1>
    <div class="filtros">
      <h2>Filtros:</h2>
      <form action="/ativo" method="GET">

        <input type="text" name="search" placeholder="Buscar pelo nome">

        <select name="tipo">
          <option value="">Tipo</option>
          <option value="fisico">Tangível</option>
          <option value="nao-fisico">Intangível</option>
        </select>

        <input type="text" name="categoria" placeholder="Buscar pela categoria">
        <label for="data_aquisicao">Data de aquisição:</label>

        <input type="date" name="data_aquisicao">

        <button type="submit">Filtrar</button>
      </form>
    </div>
  </header>

  <div class="col-8 m-auto">
    <table class="table table-hover text-center">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Categoria</th>
          <th scope="col">Data de aquisição</th>
          <th scope="col">Valor</th>
          <th scope="col">Tipo de patrimônio</th>
          <th scope="col">Mais informações</th>
        </tr>
      </thead>
      <tbody>
        <!--loop para pegar todos os atributos referentes aos ativos -->
        @foreach($ativos as $ativo)
        <tr>
          <td>{{ $ativo->nome }}</td>
          <td>{{ $ativo->descricao }}</td>
          <td>{{ $ativo->categoria }}</td>
          <td>{{ $ativo->data_de_aquisicao }}</td>
          <td>{{ $ativo->valor }}R$</td>
          <td>{{ $ativo->patrimonio }}</td>
          <td>
            <a href="{{ url("endereco/$ativo->id") }}">Visualizar localização e proprietário</a>
          </td>
          <td>
            <a href="{{ url("ativo/$ativo->id/editar") }}">
              <button type="button" class="btn btn-info">Editar</button>
            </a>
            <form action="/ativo/{{$ativo->id}}" method="POST">
              @csrf
              @method('delete')
              <button class="btn btn-danger">Excluir</button>
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    <a href="/cadastro">
      <button type="button" class="btn btn-primary">Cadastrar ativo</button>
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>