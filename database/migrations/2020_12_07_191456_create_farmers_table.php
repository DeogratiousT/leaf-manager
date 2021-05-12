<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->integer('id_number')->unique();
            $table->integer('mobile_number');
            $table->integer('acrerage');
            $table->unsignedBigInteger('county_id');
            $table->unsignedBigInteger('cropyear_id')->nullable();
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
        Schema::dropIfExists('farmers');
    }
}
