<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLiteTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lite_type', function (Blueprint $table) {
            //
            $table->string('name');
            $table->dropColumn('title');
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lite_type', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->string('title');
            $table->dropColumn('slug');
        });
    }
}
