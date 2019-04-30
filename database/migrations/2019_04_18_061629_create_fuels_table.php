<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('logSheetNo');
            $table->integer('vehicleNo');
            $table->double('start');
            $table->double('end');
            $table->double('totalkm');
            $table->double('totlitre');
            $table->double('litreprice');
            $table->double('totalcost');
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
        Schema::dropIfExists('fuels');
    }
}
