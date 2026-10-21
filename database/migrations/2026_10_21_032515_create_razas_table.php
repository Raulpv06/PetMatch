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
        Schema::create('razas', function (Blueprint $table) {
            $table->id('idRaza');
            $table->foreignId('idEspecie')->constrained('especies', 'idEspecie')->cascadeOnDelete();
            $table->string('nombreRaza', 60);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('razas');
    }
};
