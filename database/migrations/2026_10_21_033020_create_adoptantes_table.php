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
        Schema::create('adoptantes', function (Blueprint $table) {
            $table->id('idAdoptante');
            $table->string('nombre', 50);
            $table->string('apellidoPaterno', 50);
            $table->string('apellidoMaterno', 50)->nullable();
            $table->string('telefono', 15);
            $table->string('correo', 120);
            $table->string('direccionLinea', 510);
            $table->string('alcaldia', 80);
            $table->string('codigoPostal', 10);
            $table->timestamp('fechaRegistro');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoptantes');
    }
};
