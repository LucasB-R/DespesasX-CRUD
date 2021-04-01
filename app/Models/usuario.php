<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;


    protected $table = 'usuarios';
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'email',
        'password',
        'telefone',
        'is_admin',
        'is_active',
        'is_blocked'
    ];

    public function UsuarioDespesas(){
        return $this->hasMany(Despesas::class, 'id_usuario')->orderBy('id', 'desc');
    }
}
