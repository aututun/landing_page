<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGoodsBak1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_goods_bak_1', function (Blueprint $table) {
            $table->integer('Id');
            $table->integer('rid')->default(0);
            $table->unsignedInteger('goodsid')->default(0);
            $table->unsignedTinyInteger('isusing')->default(0);
            $table->unsignedInteger('forge_level')->default(1);
            $table->dateTime('starttime')->default('1900-01-01 12:00:00');
            $table->dateTime('endtime')->default('1900-01-01 12:00:00');
            $table->integer('site')->default(0);
            $table->char('Props', 255);
            $table->unsignedInteger('gcount')->default(0);
            $table->unsignedInteger('binding')->default(0);
            $table->integer('bagindex')->default(0);
            $table->integer('strong')->default(0);
            $table->tinyInteger('series')->nullable();
            $table->string('otherpramer', 256)->nullable();
            $table->integer('opstate')->default(0);
            $table->dateTime('optime');
            $table->integer('oprole')->default(0);

            $table->index('Id', 'idx_id');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_goods_bak_1');
    }

}
