<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('USUARIO', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->foreignId('idRol')->constrained('ROL', 'idRol');
            $table->string('nombre', 120);
            $table->string('apellidoPaterno', 120);
            $table->string('apellidoMaterno', 120)->nullable();
            $table->string('correo', 120)->unique();
            $table->string('contraseña', 255);
            $table->boolean('activo')->default(true);
            $table->timestamp('fechaCreacion')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('USUARIO');
    }
};