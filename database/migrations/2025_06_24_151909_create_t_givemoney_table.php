<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGivemoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_givemoney', function (Blueprint $table) {
            $table->id('Id');
            $table->integer('rid')->default(0);
            $table->integer('yuanbao')->default(0);
            $table->dateTime('rectime');
            $table->char('givetype', 32);
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_givemoney');
    }

}
