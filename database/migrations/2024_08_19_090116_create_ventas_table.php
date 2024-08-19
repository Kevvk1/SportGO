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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_pedido');
            $table->string('nombre_apellido');
            $table->string('calle_cliente');
            $table->string('calle_altura_cliente');
            $table->string('provincia');
            $table->string('localidad');
            $table->string('codigo_postal');
            $table->string('piso_departamento')->nullable();
            $table->string('metodo_pago');   
            $table->string('telefono_contacto');      
            $table->string('indicaciones_adicionales')->nullable();  
            $table->decimal('monto_total', total: 10, places: 2);
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_ultima_actualizacion')->useCurrent();

            $table->foreign('id_usuario')
            ->references('id_usuario')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('id_pedido')
                ->references('id_pedido')
                ->on('pedidos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
