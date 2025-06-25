<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGoldbuyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_goldbuy', function (Blueprint $table) {
            $table->id('Id');
            $table->integer('rid')->default(0);
            $table->integer('goodsid')->default(0);
            $table->integer('goodsnum')->default(0);
            $table->integer('totalprice')->default(0);
            $table->integer('leftgold')->default(0);
            $table->dateTime('buytime');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_goldbuy');
    }

}
