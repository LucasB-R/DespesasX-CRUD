<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Despesas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {

        $table->id();
		$table->string('descricao',50);
		$table->string('data');
		$table->string('anexo',510);
		$table->integer('id_usuario');
		$table->string('valor',11);

        });
    }

    public function down()
    {
        Schema::dropIfExists('despesas');
    }
}