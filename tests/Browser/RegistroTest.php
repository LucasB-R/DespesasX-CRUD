<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistroTest extends DuskTestCase
{
   /** @test */
    public function ver_se_usuario_registra()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cadastro')
                    ->type('email', 'testeseregistra@meuteste.com.br')
                    ->type('nome', 'Teste')
                    ->type('telefone', '(31) 99999-8888')
                    ->type('senha', '123456789')
                    ->press('submit')
                    ->assertPathIs('/login')
                    ->assertSee('Conta Criada!');

        });
    }
}
