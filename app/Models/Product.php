<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    // REMOVE essa linha, porque a PK padrão já é "id"
    // protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price'
    ];

    public $timestamps = true;
}
