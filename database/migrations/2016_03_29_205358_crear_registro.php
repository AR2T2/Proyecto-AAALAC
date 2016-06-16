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
        Schema::create('usuariosaaalac', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario');
            $table->string('contraseña');
            $table->timestamps();
        });
        // segunda tabla
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_servicio');
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
        Schema::create('agentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_agente_aduanal');
            $table->date('Fecha_inscripcion');
            $table->string('Patente',4);
            $table->string('Correo_aa');
            $table->integer('registros_id')->unsigned(); // llave foranea de status
            $table->foreign('registros_id')->references('id')->on('registros');            
            $table->integer('status_id')->unsigned(); // llave foranea de status
            $table->foreign('status_id')->references('id')->on('status');
            $table->timestamps();
        });
        // sexta tabla
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
            $table->integer('agentes_id')->unsigned(); // llave foranea de agentes aduanales
            $table->foreign('agentes_id')->references('id')->on('agentes');
            $table->integer('servicios_id')->unsigned(); // llave foranea de servicios
            $table->foreign('servicios_id')->references('id')->on('servicios');
            $table->integer('usuariosaaalac_id')->unsigned(); // llave foranea de usuarios
            $table->foreign('usuariosaaalac_id')->references('id')->on('usuariosaaalac');
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
        Schema::drop('usuariosaaalac');
        Schema::drop('servicios');
        Schema::drop('registros');
        Schema::drop('status');
        Schema::drop('agentes');
        Schema::drop('agencias');
    }
}
