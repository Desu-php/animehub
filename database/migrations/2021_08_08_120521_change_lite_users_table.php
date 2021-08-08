<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLiteUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lite_users', function (Blueprint $table) {
            //
            $table->string('login')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->integer('date')->nullable()->change();
            $table->dropColumn('salt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lite_users', function (Blueprint $table) {
            //
            $table->string('login')->change();
            $table->string('email')->change();
            $table->string('password')->change();
            $table->integer('date')->change();
            $table->string('salt');
        });
    }
}
