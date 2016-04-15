<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaAgenteaduanal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_agencia',50);
            $table->string('Gerente_agencia',50);
            $table->string('Jefe_operaciones',50);
            $table->string('Direccion',50);
            $table->integer('Telefono',50);
            $table->string('Correo_gte',50);
            $table->string('Correo_operaciones',50);
            $table->string('Correo_administracion',50);
            $table->string('Jefe_administracion',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agencias');
    }
}
