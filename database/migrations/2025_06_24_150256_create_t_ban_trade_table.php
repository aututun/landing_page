<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBanTradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_ban_trade', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->date('day');
            $table->tinyInteger('hour');
            $table->integer('distinct_roles')->default(0);
            $table->unsignedInteger('market_times')->default(0);
            $table->unsignedInteger('market_in_price')->default(0);
            $table->integer('market_out_price')->default(0);
            $table->integer('trade_times')->default(0);
            $table->integer('trade_in_price')->default(0);
            $table->integer('trade_out_price')->default(0);

            $table->primary(['rid', 'day', 'hour'], 't_ban_trade_pk');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_ban_trade');
    }
}
