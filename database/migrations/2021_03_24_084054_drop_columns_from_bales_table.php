<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromBalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bales', function (Blueprint $table) {
            $table->dropColumn('weight_at_reception');
            $table->dropColumn('weight_at_loading');
            $table->dropColumn('weight_at_off_loading');
            $table->dropColumn('weight_at_processing');
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
