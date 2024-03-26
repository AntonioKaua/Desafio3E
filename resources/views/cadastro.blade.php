<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar ativos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Cadastro de ativos</h1>

    <div id="app">
        <form action="/cadastrar-ativo" method="post">
            @csrf
            <div class="form-group">
                <label for="nomeAtivo" class="form-label">Nome do Ativo</label>
                <input type="text" placeholder="Digite o nome do ativo" id="nomeAtivo" name="nome" required>
            </div>
            <div class="form-group">
                <label for="descricaoAtivo" class="form-label">Descrição do Ativo</label>
                <input type="text" placeholder="Digite a descrição do ativo" id="descricaoAtivo" name="descricao" required>
            </div>
            <div class="form-group">
                <label for="categoriaAtivo" class="form-label">Categoria do Ativo</label>
                <input type="text" placeholder="Digite a categoria do ativo" id="categoriaAtivo" name="categoria" required>
            </div>
            <div class="form-group">
                <label for="dataDeAquisicaoAtivo" class="form-label">Data de Aquisição do Ativo</label>
                <input type="date" placeholder="Digite a data em que o produto foi adquirido pela empresa" id="dataDeAquisicaoAtivo" name="data_de_aquisicao" required>
            </div>
            <div class="form-group">
                <label for="valorAtivo" class="form-label">Valor do Ativo</label>
                <input type="number" placeholder="Digite o valor do ativo" id="valorAtivo" name="valor">
            </div>
            <div class="form-group">
                <label for="objetoFisico" class="form-label">Qual o tipo do Ativo?</label>
                <select name="patrimonio" id="patrimonio">
                    <option value="tangível">Tangível</option>
                    <option value="intangível">Intangível</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nomePessaAtivo" class="form-label">Proprietário</label>
                <input type="text" placeholder="Nome do proprietário" id="ruaAtivo" name="nome_pessoa" required>
                <small class="text-muted">Pessoa físico ou jurídico.</small>
            </div>
            <div class="form-group">
                <label for="identificadorAtivo" class="form-label">Identificador do proprietário</label>
                <input type="text" placeholder="CPF ou CNPJ" id="identificadorAtivo" name="identificador" required pattern="^\d{11}|\d{14}$">
                <small class="text-muted">Deve ter exatamente 11 ou 14 dígitos (apenas números).</small>
            </div>

            <div class="form-group">
                <label for="ruaAtivo" class="form-label">Rua do Ativo</label>
                <input type="text" placeholder="Digite a rua onde o ativo ou seu propritério se localiza" id="ruaAtivo" name="rua" required>
            </div>
            <div class="form-group">
                <label for="numeroAtivo" class="form-label">Número do Ativo</label>
                <input type="number" placeholder="Digite o número de endereço do ativo" id="numeroAtivo" name="numero" required>
            </div>
            <div class="form-group">
                <label for="bairroAtivo" class="form-label">Bairro do Ativo</label>
                <input type="text" placeholder="Digite o bairro que o ativo se localiza" id="bairroAtivo" name="bairro" required>
            </div>
            <div class="form-group">
                <label for="cidadeAtivo" class="form-label">Cidade do Ativo</label>
                <input type="text" placeholder="Digite a cidade que o ativo se localiza" id="cidadeAtivo" name="cidade" required>
            </div>
            <div class="form-group">
                <label for="estadoAtivo" class="form-label">Estado do Ativo</label>
                <input type="text" placeholder="Digite o estado que o ativo se localiza" id="estadoAtivo" name="estado" required>
            </div>
            <div class="form-group">
                <label for="paisAtivo" class="form-label">Pais do Ativo</label>
                <input type="text" placeholder="Digite o estado que o ativo se localiza" id="estadoAtivo" name="pais" required>
            </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>