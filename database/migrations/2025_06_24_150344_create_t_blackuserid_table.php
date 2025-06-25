<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBlackuseridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_blackuserid', function (Blueprint $table) {
            $table->char('userid', 64)->collation('utf8mb3_general_ci');
            $table->primary('userid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_blackuserid');
    }
}
