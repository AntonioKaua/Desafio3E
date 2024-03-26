<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    //atributos que podem receber valores em massa
    protected $fillable = ['nome_pessoa', 'identificador'];

    //relacionamento com a tabela de ativos, uma pessoa pode ter vários ativos 1:n
    public function ativos()
    {
        return $this->hasMany(Ativo::class);
    }
    public $timestamps = false;
}
