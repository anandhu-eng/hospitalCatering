<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('patient_details', function (Blueprint $table) {
            $table->id('PID');
            $table->string('PatientName');
            $table->string('PhNo');
            $table->string('Address');
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_details');
    }
}
