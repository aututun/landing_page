<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTKfTiantiGameLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_kf_tianti_game_log', function (Blueprint $table) {
            $table->integer('rid');
            $table->integer('zoneid1');
            $table->char('rolename1', 20)->collation('utf8mb3_bin');
            $table->integer('zoneid2');
            $table->char('rolename2', 20)->collation('utf8mb3_bin');
            $table->tinyInteger('success');
            $table->integer('duanweijifenaward');
            $table->integer('rongyaoaward');
            $table->dateTime('endtime')->default('2001-11-11 00:00:00');

            $table->index(['rid', 'endtime'], 'idx_rid_endtime');
        });
    }

    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_kf_tianti_game_log');
    }

}
