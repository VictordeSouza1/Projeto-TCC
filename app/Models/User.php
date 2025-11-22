<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // INFORMAR AO LARAVEL QUE SUA PK É user_id
    protected $primaryKey = 'user_id';

    // DIZER QUE A PK É INCREMENTAL (auto_increment)
    public $incrementing = true;

    // DIZER QUE O TIPO DA CHAVE É INTEIRO
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'email',
        'password',
        'cnpj',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
