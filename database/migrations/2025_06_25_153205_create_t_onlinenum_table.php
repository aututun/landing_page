<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTOnlinenumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_onlinenum', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('num')->default(0);
            $table->dateTime('rectime');
            $table->char('mapnum', 254)->collation('utf8mb3_general_ci')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_onlinenum');
    }
}
