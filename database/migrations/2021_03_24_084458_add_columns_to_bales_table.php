<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bales', function (Blueprint $table) {
            $table->float('weight_at_reception', 8, 2);
            $table->float('weight_at_loading', 8, 2)->nullable();
            $table->float('weight_at_off_loading', 8, 2)->nullable();
            $table->float('weight_at_processing', 8, 2)->nullable();
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
