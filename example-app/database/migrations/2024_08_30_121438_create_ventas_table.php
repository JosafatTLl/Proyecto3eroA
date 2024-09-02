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
            $table->id('VentaID');
            $table->unsignedBigInteger('ProductoID');
            $table->string('NombreCliente', 100); // Agregar nombre del cliente
            $table->integer('Cantidad');
            $table->decimal('PrecioTotal', 10, 2);
            $table->timestamps();

            // Relación con la tabla productos
            $table->foreign('ProductoID')->references('ProductoID')->on('productos')
                ->onDelete('cascade'); // Elimina la venta si el producto es eliminado
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
