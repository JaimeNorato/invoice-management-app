<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->comment('Factura a la que pertenece el item')->references('id')->on('invoices');
            $table->string('description')->comment('Descripción del item');
            $table->double('quantity')->comment('Cantidad del item');
            $table->double('unit_price')->comment('Precio unitario del item');
            $table->double('total')->comment('Valor total de los items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
};
