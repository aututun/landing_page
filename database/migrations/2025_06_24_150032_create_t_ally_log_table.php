<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTAllyLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_ally_log', function (Blueprint $table) {
            $table->id(); // PRIMARY KEY AUTO_INCREMENT
            $table->integer('myUnionID')->nullable();
            $table->integer('unionID')->nullable();
            $table->integer('unionZoneID')->nullable();
            $table->char('unionName', 32)->nullable()->collation('utf8mb3_general_ci');
            $table->dateTime('logTime')->nullable();
            $table->integer('logState')->nullable();

            $table->index(['myUnionID', 'logTime'], 'idx_id_time');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_ally_log');
    }
}
