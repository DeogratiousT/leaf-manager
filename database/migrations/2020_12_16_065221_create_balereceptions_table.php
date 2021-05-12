<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalereceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balereceptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('station_id');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->integer('number_of_bales');
            $table->string('officer');
            $table->unsignedBigInteger('farmer_id');
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
        Schema::dropIfExists('balereceptions');
    }
}
