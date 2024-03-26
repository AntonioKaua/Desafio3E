<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Localização do Ativo</h1>

    <div class="col-8 m-auto">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Proprietário</th>
                    <th scope="col">Identificador</th>
                    <th scope="col">Rua</th>
                    <th scope="col">Número</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">País</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$ativo->pessoa->nome_pessoa}}</td>
                    <td>
                        @if(strlen($ativo->pessoa->identificador) === 14)
                            CNPJ: {{$ativo->pessoa->identificador}}
                        @else
                            CPF: {{$ativo->pessoa->identificador}}
                        @endif
                    </td>
                    <td>{{$ativo->localizacoe->rua}}</td>
                    <td>{{$ativo->localizacoe->numero}}</td>
                    <td>{{$ativo->localizacoe->bairro}}</td>
                    <td>{{$ativo->localizacoe->cidade}}</td>
                    <td>{{$ativo->localizacoe->estado}}</td>
                    <td>{{$ativo->localizacoe->pais}}</td>
                </tr>
            </tbody>
        </table>

    </div>

</body>

</html>
