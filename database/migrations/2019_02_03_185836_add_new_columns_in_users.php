<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnsInUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('setting_1')->default(0);
            $table->boolean('setting_2')->default(0);
            $table->string('label');
            $table->string('lat');
            $table->string('lng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('setting_1');
            $table->dropColumn('setting_2');
            $table->string('label');
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
    }
}
