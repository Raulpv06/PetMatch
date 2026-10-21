<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id('idMascota');
            $table->foreignId('idRaza')->constrained('razas', 'idRaza');
            $table->foreignId('idEstadoMascota')->constrained('estado_mascotas', 'idEstadoMascota');
            $table->foreignId('idUsuario')->constrained('usuario', 'idUsuario'); 
            $table->string('nombre', 60);
            $table->smallInteger('edadEstimadaMeses')->nullable();
            $table->char('sexo', 1);
            $table->string('tamanio', 20);
            $table->text('descripcionFisica')->nullable();
            $table->date('fechaIngreso');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
