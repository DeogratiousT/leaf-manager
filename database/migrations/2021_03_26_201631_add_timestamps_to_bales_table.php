<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToBalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bales', function (Blueprint $table) {
            $table->date('creation_date')->nullable();
            $table->date('loading_date')->nullable();
            $table->date('off_loading_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bales', function (Blueprint $table) {
            //
        });
    }
}
