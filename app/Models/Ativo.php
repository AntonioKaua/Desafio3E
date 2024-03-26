<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ativo extends Model
{
    use HasFactory;
    //atributos que podem receber valores em massa
    protected $fillable = ['nome', 'descricao', 'categoria', 'data_de_aquisicao', 'valor', 'patrimonio', 'localizacao_id', 'pessoa_id'];

    // Define o relacionamento com a tabela localizacoes, um ativo pertence a uma localização 1:1
    public function localizacoe()
    {
        return $this->belongsTo(Localizacoe::class, 'localizacao_id');
    }
    // Define o relacionamento com a tabela localizacoes, um ativo pertence a uma pessoa/proprietário 1:1
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }
    
    public $timestamps = false;
    

}
