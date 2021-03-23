<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
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
}
