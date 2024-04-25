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
        Schema::create('psa_pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('direccion',500);
            $table->string('telefono', 20)->nullable();
            $table->string('avatar')->nullable();
            $table->foreignId('id_producto')->constrained('productos');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psa_pedidos');
    }
};
