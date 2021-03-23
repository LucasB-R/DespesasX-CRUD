<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function somente_usuarios_com_permissao_podem_acessar_as_paginas()
    {
        $this->get('/despesas/adicionar')->assertRedirect('/login');
        $this->get('/despesas/anteriores')->assertRedirect('/login');
        $this->get('/despesas/editar/25')->assertRedirect('/login');
        $this->get('/despesas/delete/14')->assertRedirect('/login');
        $this->get('/ajax/dadosTabela')->assertRedirect('/login');
        $this->get('/gerenciamento')->assertRedirect('/login');
        $this->get('/gerenciamento/ativos')->assertRedirect('/login');
        $this->get('/API/Aceitar/1')->assertRedirect('/login');
        $this->get('/API/unBlock/1')->assertRedirect('/login');
        $this->get('/API/Delete/1')->assertRedirect('/login');
        $this->get('/API/Block/1')->assertRedirect('/login');

    }
}
