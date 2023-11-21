<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderNo');
            $table->unsignedBigInteger('FID');
            $table->foreign('FID')->references('FID')->on('foods');
            $table->unsignedBigInteger('PID');
            $table->foreign('PID')->references('PID')->on('patient_details');
            $table->integer('WardNo');
            $table->string('DeliveryStatus')->default('Pending');
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
