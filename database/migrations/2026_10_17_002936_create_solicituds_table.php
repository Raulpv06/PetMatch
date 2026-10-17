<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('SOLICITUD', function (Blueprint $table) {
            $table->id('idSolicitud');
            $table->unsignedBigInteger('idMascota');
            $table->unsignedBigInteger('idAdoptante');
            $table->foreignId('idEstadoSolicitud')->constrained('ESTADO_SOLICITUD', 'idEstadoSolicitud');
            $table->foreignId('idUsuario')->constrained('USUARIO', 'idUsuario');
            $table->timestamp('fechaSolicitud')->useCurrent();
            $table->string('motivoRechazo', 255)->nullable();
            $table->timestamp('fechaResolucion')->nullable();
            $table->timestamps();

            // NOTA: Cuando  se fusionen las ramas se descomentan estas dos líneas:
            // $table->foreign('idMascota')->references('idMascota')->on('MASCOTA');
            // $table->foreign('idAdoptante')->references('idAdoptante')->on('ADOPTANTE');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('SOLICITUD');
    }
};