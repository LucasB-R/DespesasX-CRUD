<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\despesas;
use App\Models\usuario;

class UserTest extends TestCase
{
   /** @test */
    public function checar_colunas_das_despesas_estao_corretas()
    {
        $despesas = new despesas;
        $colunasEsperadas = [
            'descricao',
            'data',
            'anexo',
            'id_usuario',
            'valor'
        ];

        $comparar = array_diff($colunasEsperadas, $despesas->getFillable());
        $this->assertEquals(0, count($comparar));
    }

    public function checar_colunas_dos_usuarios_estao_corretas()
    {
        $usuarios = new usuario;
        $colunasEsperadas = [
            'nome',
            'email',
            'password',
            'telefone',
            'is_admin',
            'is_active',
            'is_blocked'
        ];

        $comparar = array_diff($colunasEsperadas, $usuarios->getFillable());
        $this->assertEquals(0, count($comparar));
    }


}
