<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Planta;
use App\Models\User;

class Treatment extends Model
{
    protected $table = 'treatments';

    protected $fillable = [
        'plant_id',
        'user_id',
        'nome',
        'descricao',
        'modo_preparo',
        'observacoes'
    ];

    // Um tratamento pertence a uma planta
    public function planta()
    {
        return $this->belongsTo(Planta::class, 'plant_id', 'id');
    }

    // Um tratamento pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
