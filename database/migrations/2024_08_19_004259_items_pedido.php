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
        Schema::create('itemsPedido', function (Blueprint $table) {
            $table->id('id_itemsPedido');
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_ultima_actualizacion')->useCurrent();

            $table->foreign('id_pedido')
                ->references('id_pedido')
                ->on('pedidos')
                ->onDelete('cascade');

            $table->foreign('id_producto')
                ->references('codigo_producto')
                ->on('productos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemsPedido');
    }
};
