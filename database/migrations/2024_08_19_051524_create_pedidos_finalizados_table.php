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
        Schema::create('pedidos_finalizados', function (Blueprint $table) {
            $table->id('id_pedido_finalizado');
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_ultima_actualizacion')->useCurrent();

            $table->foreign('id_pedido')
                ->references('id_pedido')
                ->on('pedidos')
                ->onDelete('cascade');

            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_finalizados');
    }
};
