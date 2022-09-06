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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('number')->comment('Número de la factura');
            $table->dateTime('date_time')->comment('Fecha y hora de la factura');
            $table->foreignId('issuer_id')->comment('Emisor de la factura')->references('id')->on('issuers');
            $table->foreignId('receiver_id')->comment('Receptor de la factura')->references('id')->on('receivers');
            $table->double('subtotal')->comment('valor antes de iva');
            $table->double('iva')->comment('valor antes de iva');
            $table->double('total')->default(0)->comment('valor total a pagar');
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
        Schema::dropIfExists('invoices');
    }
};
