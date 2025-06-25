<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTNpcbuyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_npcbuy', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('rid')->default(0);
            $table->integer('goodsid')->default(0);
            $table->integer('goodsnum')->default(0);
            $table->integer('totalprice')->default(0);
            $table->integer('leftmoney')->default(0);
            $table->integer('moneytype')->default(0);
            $table->dateTime('buytime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_name_check');
    }
}
