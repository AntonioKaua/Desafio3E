<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar ativos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Editar ativo</h1>
    <div id="app">
        <form action="{{ url('ativo', $ativo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="nome">Nome</label>
            <input type="text" placeholder="digite o nome" name="nome" value="{{$ativo->nome}}" required>
    </div>
    <div class="form-group">
        <label for="descricaoAtivo" class="form-label">Descrição</label>
        <input type="text" placeholder="digite a descrição" name="descricao" value="{{$ativo->descricao}}" required>
    </div>
    <div class="form-group">
        <label for="categoriaAtivo" class="form-label">Categoria</label>
        <input type="text" placeholder="digite a categoria" name="categoria" value="{{$ativo->categoria}}" required>
    </div>
    <div class="form-group">
        <label for="dataDeAquisicaoAtivo" class="form-label">Data de aquisição</label>
        <input type="date" placeholder="Digite a data em que o produto foi adiquirido pela empresa" name="data_de_aquisicao" required value="{{$ativo->data_de_aquisicao}}">
    </div>
    <div class="form-group">
        <label for="valorAtivo" class="form-label">Valor</label>
        <input type="number" placeholder="digite o valor" name="valor" value="{{$ativo->valor}}" required>
    </div>

    <div class="form-group">
        <label for="proprietarioAtivo" class="form-label">Proprietário</label>
        <input type="text" placeholder="digite o nome do proprietário que o ativo se localiza" name="nome_pessoa" required value="{{$ativo->pessoa->nome_pessoa}}">
        <small class="text-muted">Pessoa físico ou jurídico.</small>
    </div>
    <div class="form-group">
        <label for="identificadorAtivo" class="form-label">Identificador do proprietário</label>
        <input type="text" placeholder="CPF ou CNPJ" name="identificador" required value="{{$ativo->pessoa->identificador}}" pattern="^\d{11}|\d{14}$">
        <small class="text-muted">11 ou 14 caracteres(apenas números CPF ou CNPJ).</small>
    </div>
    </div>
    <div class="form-group">
        <label for="ruaAtivo" class="form-label">Rua</label>
        <input type="text" placeholder="digite a rua que o ativo se localiza" name="rua" required value="{{$ativo->localizacoe->rua}}">
    </div>
    <div class="form-group">
        <label for="numeroAtivo" class="form-label">Número da construção</label>
        <input type="number" placeholder="digite o número de endereço" name="numero" required value="{{$ativo->localizacoe->numero}}">
    </div>
    <div class="form-group">
        <label for="bairroAtivo" class="form-label">Bairro</label>
        <input type="text" placeholder="digite o bairro que o ativo se localiza" name="bairro" required value="{{$ativo->localizacoe->bairro}}">
    </div>
    <div class="form-group">
        <label for="ciadadeAtivo" class="form-label">Cidade</label>
        <input type="text" placeholder="digite a cidade que o ativo se localiza" name="cidade" required value="{{$ativo->localizacoe->cidade}}">
    </div>
    <div class="form-group">
        <label for="estadoAtivo" class="form-label">Estado</label>
        <input type="text" placeholder="digite o estado que o ativo se localiza" name="estado" required value="{{$ativo->localizacoe->estado}}">
    </div>
    <div class="form-group">
        <label for="paisAtivo" class="form-label">País</label>
        <input type="text" placeholder="digite o estado que o ativo se localiza" name="pais" required value="{{$ativo->localizacoe->pais}}">
    </div>
    <!-- Outros campos tangíveis aqui -->
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
    </div>


</body>

</html>