<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLiteTypePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lite_type_post', function (Blueprint $table) {
            $table->renameColumn('id_type_post', 'id');
            $table->string('alias');
            $table->renameColumn('title_type_post', 'name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lite_type_post', function (Blueprint $table) {
            $table->renameColumn('id', 'id_type_post');
            $table->dropColumn('alias');
            $table->renameColumn('name', 'title_type_post');
        });
    }
}
