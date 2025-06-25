<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTExchange1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_exchange1', function (Blueprint $table) {
            $table->id('Id');
            $table->integer('rid')->default(0);
            $table->integer('goodsid')->default(0);
            $table->integer('goodsnum')->default(0);
            $table->integer('leftgoodsnum')->default(0);
            $table->integer('otherroleid')->default(0);
            $table->char('result', 64)->collation('utf8mb3_general_ci');
            $table->dateTime('rectime');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_exchange1');
    }

}
