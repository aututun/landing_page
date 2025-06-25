<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_goods', function (Blueprint $table) {
            $table->id('Id');
            $table->integer('rid')->default(0)->index();
            $table->unsignedInteger('goodsid')->default(0);
            $table->integer('isusing')->default(-1);
            $table->unsignedInteger('forge_level')->default(1);
            $table->dateTime('starttime')->default('1900-01-01 12:00:00');
            $table->dateTime('endtime')->default('1900-01-01 12:00:00');
            $table->integer('site')->default(0);
            $table->string('Props', 2000);
            $table->unsignedInteger('gcount')->default(0);
            $table->unsignedInteger('binding')->default(0);
            $table->integer('bagindex')->default(0);
            $table->integer('strong')->default(0);
            $table->tinyInteger('series')->nullable();
            $table->string('otherpramer', 1000)->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_goods');
    }

}
