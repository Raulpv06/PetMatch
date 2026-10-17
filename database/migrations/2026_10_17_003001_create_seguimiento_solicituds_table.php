<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('SEGUIMIENTO_SOLICITUD', function (Blueprint $table) {
            $table->id('idSeguimientoSolicitud');
            $table->foreignId('idSolicitud')->constrained('SOLICITUD', 'idSolicitud')->onDelete('cascade');
            $table->foreignId('idEstadoSolicitud')->constrained('ESTADO_SOLICITUD', 'idEstadoSolicitud');
            $table->foreignId('idUsuario')->constrained('USUARIO', 'idUsuario');
            $table->timestamp('fechaCambio')->useCurrent();
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('SEGUIMIENTO_SOLICITUD');
    }
};