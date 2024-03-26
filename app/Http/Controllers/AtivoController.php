<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ativo;
use App\Http\Requests\AtivoRequest;
use App\Models\Localizacoe;
use App\Models\Pessoa;

class AtivoController extends Controller
{

    private $objAtivo;

    public function __construct()
    {
        $this->objAtivo = new Ativo();
    }


    //Resgata todos os bojetos Ativo para a visualizaçao no dashboard da view 'ativo.blade.php' além de conter a lógica para os filtros
    public function index(Request $request)
    {
        $ativos = Ativo::all();
        $ativos = Ativo::with('localizacoe')->get();
        $ativos = Ativo::with('pessoa')->get();


        $tipo_patrimonio = $request->input('tipo');
        $search = $request->input('search');
        $data_aquisicao = $request->input('data_aquisicao');
        $categoria = $request->input('categoria');

        // Inicializa uma consulta para todos os ativos
        $query = Ativo::query();

        // Aplica filtro de tipo
        if ($tipo_patrimonio == 'fisico') {
            $query->where('patrimonio', 'like', 'físico');
        } elseif ($tipo_patrimonio == 'nao-fisico') {
            $query->where('patrimonio', 'like', 'intangível');
        }

        // Aplica filtro de pesquisa
        if ($search) {
            $query->where('nome', 'like', '%' . $search . '%');
        }

        // Aplica filtro por data de aquisição
        if ($data_aquisicao) {
            $query->whereDate('data_de_aquisicao', $data_aquisicao);
        }

        if ($categoria) {
            $query->where('categoria', $categoria);
        }

        // Obtém os resultados da consulta
        $ativos = $query->get();

        return view('ativo', compact('ativos'));
    }

    //quando chamada retorna a view 'cadastro' que serve para cadastrar novos ativos 
    public function create()
    {
        return view('cadastro');
    }

    //quando chamada retorna a view 'endereco' que mostra a localização do ativo resgatando o id dele
    public function show($id)
    {
        $ativo = Ativo::findOrFail($id);
        return view('endereco', compact('ativo'));
    }


    //quando chamada assimila os dados passados nos campos do form de cadastro com as colunas de cada classe(incluindo as estrangeiras)
    public function store(Request $request)
    {
        $localizacao = Localizacoe::firstOrCreate([
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
        ]);

        // Encontrar ou criar a pessoa
        $pessoa = Pessoa::firstOrCreate([
            'nome_pessoa' => $request->nome_pessoa,
            'identificador' => $request->identificador,
        ]);

        // Criar o novo ativo e atribuir as chaves estrangeiras
        $ativo = Ativo::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'categoria' => $request->categoria,
            'data_de_aquisicao' => $request->data_de_aquisicao,
            'valor' => $request->valor,
            'patrimonio' => $request->patrimonio,
            'localizacao_id' => $localizacao->id,
            'pessoa_id' => $pessoa->id,
        ]);

        return redirect('/ativo')->with('success', 'Ativo cadastrado com sucesso');
    }

    //quando chamada retorna a view 'editar' que serve para editar os dados do ativo
    public function edit($id)
    {
        $ativo = Ativo::findOrFail($id); // Carrega o ativo com o ID fornecido
        return view('editar', compact('ativo')); // Retorna a visualização de edição com os dados do ativo
    }


    //lógica por trás da edição, basicamente substitui os valores antigos pelos novos passados no form de edição de ativo(incluindo as chaves estrnageiras)
    public function update(AtivoRequest $request, $id)
    {
        $ativo = Ativo::findOrFail($id);


        $localizacao = Localizacoe::firstOrCreate([
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
        ]);

        $pessoa = Pessoa::firstOrCreate([
            'nome_pessoa' => $request->nome_pessoa,
            'identificador' => $request->identificador,
        ]);

        $ativo->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'categoria' => $request->categoria,
            'data_de_aquisicao' => $request->data_de_aquisicao,
            'valor' => $request->valor,
            'localizacao_id' => $localizacao->id,
            'pessoa_id' => $pessoa->id,
        ]);

        return redirect('/ativo')->with('success', 'Ativo atualizado com sucesso');
    }

    //quando chamada deleta o ativo
    public function destroy($id)
    {
        $ativo = Ativo::findOrFail($id); //encontra o ativo pelo id
        $ativo->delete(); //deleta o ativo

        return redirect('/ativo')->with('success', 'Ativo excluído com sucesso'); //redireciona para a view do dashboard
    }
}
