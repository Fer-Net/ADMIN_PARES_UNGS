<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('tipo');
            $table->integer('distrito');
            $table->string('otro_distrito')->nullable();
            $table->string('direccion');
            $table->string('email');
            $table->string('phone');
            $table->boolean('existen_registros_compras_ungs')->default(false);
            $table->string('correo_electronico')->nullable();
            $table->string('pagina_web')->nullable();
            $table->string('nombre_referente')->nullable();
            $table->string('referente')->nullable();
            $table->string('cargo')->nullable();
            $table->string('cuit')->nullable();
            $table->string('matricula_inaes')->nullable();
            $table->string('registro_provincial_dipac')->nullable();
            $table->boolean('inscriptos_renatep')->default(false);
            $table->boolean('cooperativa_registro_nacional_efectores')->default(false);
            $table->boolean('inscriptos_sipro')->default(false);
            $table->integer('cantidad_trabajadores')->nullable();
            $table->integer('trabajadores_mujeres_diversidades')->nullable();
            $table->float('porcentaje_mujeres_diversidades')->nullable();
            $table->boolean('trabajadores_discapacidad')->default(false);
            $table->integer('escala_produccion')->nullable();
            $table->date('fecha_inscripcion')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
