<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTActivateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_activate', function (Blueprint $table) {
            $table->id(); // PRIMARY KEY AUTO_INCREMENT
            $table->char('userID', 64)->nullable()->collation('utf8mb3_general_ci');
            $table->integer('zoneID')->nullable();
            $table->integer('roleID')->nullable();
            $table->dateTime('logTime')->nullable();
            $table->index('userID', 'userID_dex');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_activate');
    }
}
