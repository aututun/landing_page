<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBanLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_ban_log', function (Blueprint $table) {
            $table->id(); // AUTO_INCREMENT PRIMARY KEY
            $table->integer('zoneID')->default(0);
            $table->char('userID', 64)->collation('utf8mb3_general_ci');
            $table->integer('roleID')->default(0);
            $table->integer('banType')->default(0);
            $table->string('banID', 255)->default('')->collation('utf8mb3_general_ci');
            $table->integer('banCount')->default(0);
            $table->dateTime('logTime');
            $table->string('deviceID', 255)->nullable()->collation('utf8mb3_general_ci');

            $table->index(['zoneID', 'userID', 'logTime'], 'ban_idx');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_ban_log');
    }
}
