<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ESTADO_SOLICITUD', function (Blueprint $table) {
            $table->id('idEstadoSolicitud');
            $table->string('nombreEstado', 30);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ESTADO_SOLICITUD');
    }
};