<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {

        $table->id();
		$table->string('nome');
		$table->string('email');
		$table->string('password');
		$table->string('telefone');
		$table->string('remember_token')->nullable()->default('NULL');
		$table->integer('is_admin')->default('0');
		$table->integer('is_blocked')->default('0');
		$table->integer('is_active')->default('0');
        $table->timestamp('criado_em')->useCurrent();


        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}