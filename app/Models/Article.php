<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $primaryKey = 'article_id'; // corresponde à PK da tabela

    protected $fillable = [
        'user_id',
        'title',
        'author',
        'publication_date',
        'description',
        'scientific_references',
        'image',
    ];

    // Relacionamento com usuário
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
