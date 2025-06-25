<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTExchange2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_exchange2', function (Blueprint $table) {
            $table->id('Id');
            $table->integer('rid')->default(0);
            $table->integer('yinliang')->default(0);
            $table->integer('leftyinliang')->default(0);
            $table->integer('otherroleid')->default(0);
            $table->dateTime('rectime');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_exchange2');
    }

}
