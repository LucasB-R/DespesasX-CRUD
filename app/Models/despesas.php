<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class despesas extends Model
{
    use HasFactory;

    protected $table = 'despesas';
    public $timestamps = false;
    protected $fillable = [
        'descricao',
        'data',
        'anexo',
        'id_usuario',
        'valor'
    ];
}
