<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacoe extends Model
{
    use HasFactory;

    //atributos que pode receber valores em massa
    protected $fillable = ['rua', 'numero', 'bairro', 'cidade', 'estado', 'pais'];

    // Relacionamento com a tabela de Ativos, uma localização pode ter vários ativos 1:n
    public function ativos()
    {
        return $this->hasMany(Ativo::class);
    }
    public $timestamps = false;
}
