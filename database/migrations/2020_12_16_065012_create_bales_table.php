<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bales', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->unsignedBigInteger('grade_id');
            $table->integer('weight_at_reception');
            $table->integer('weight_at_loading')->nullable();
            $table->integer('weight_at_off_loading')->nullable();
            $table->integer('weight_at_processing')->nullable();
            $table->unsignedBigInteger('farmer_id');
            $table->unsignedBigInteger('balereception_id');
            $table->unsignedBigInteger('lorry_id')->nullable();;
            $table->string('state');
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
        Schema::dropIfExists('bales');
    }
}
