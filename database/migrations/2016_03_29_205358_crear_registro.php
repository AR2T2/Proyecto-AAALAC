<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearRegistro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Primera tabla
        Schema::create('agentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_agente_aduanal');
            $table->string('Patente',4);
            $table->string('Correo_aa');
            $table->timestamps();
        });
        // segunda tabla
        Schema::create('agencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_agencia', 50);
            $table->string('Gerente_agencia', 50);
            $table->string('Jefe_operaciones', 50);
            $table->string('Direccion', 50);
            $table->integer('Telefono');
            $table->string('Correo_gte', 50);
            $table->string('Correo_operaciones', 50);
            $table->string('Correo_administracion', 50);
            $table->string('Jefe_administracion', 50);
            $table->timestamps();
        });
        // tercera tabla
        Schema::create('registros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('RFC',10);
            $table->string('CURP',10);
            $table->string('INE',10);
            $table->string('Registro-local',2);
            $table->string('Pago',2);
            $table->timestamps();
        });
        // cuarta tabla
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('campoStatus',['Alta','Baja','Proceso','Suspendido']);
            $table->string('observacion');
            $table->timestamps();
        });
        // quinta tabla
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_proyecto');
            $table->timestamps();
        });
        // sexta tabla
        Schema::create('usuariosaaalac', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario');
            $table->string('contraseña');
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
        Schema::drop('agentes');
        Schema::drop('agencias');
        Schema::drop('registros');
        Schema::drop('status');
        Schema::drop('proyectos');
        Schema::drop('usuariosaaalac');
    }
}
