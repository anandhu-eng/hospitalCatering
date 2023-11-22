<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentPatientsTable extends Migration
{
    public function up()
    {
        Schema::create('current_patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('PID');
            $table->foreign('PID')->references('PID')->on('patient_details');
            $table->string('WardNo');
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('current_patients');
    }
}
