<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;

    // Nome da tabela (pois não segue o padrão "plants")
    protected $table = 'plantas';

    // Campos que podem ser preenchidos
    protected $fillable = [
        'nome',
        'tipo',
        'descricao',
        'imagem',
    ];

    /**
     * Relacionamento com tratamentos
     * Uma planta pode ter vários tratamentos naturais.
     */
    public function treatments()
    {
        return $this->hasMany(Treatment::class, 'plant_id', 'id');
    }
}
