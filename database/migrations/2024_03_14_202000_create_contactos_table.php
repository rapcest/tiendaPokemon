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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento', 45)->nullable();
            $table->string('nro_documento', 20)->nullable();
            $table->date('vencimiento_documento')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion', 200)->nullable();
            $table->string('telefono', 14)->nullable();
            $table->string('telegram', 10)->nullable();
            $table->string('avatar')->nullable();
            $table->string('vip', 10)->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
