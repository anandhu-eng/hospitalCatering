<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id('FID');
            $table->string('FName');
            $table->decimal('Price', 8, 2);
            $table->text('Description');
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
