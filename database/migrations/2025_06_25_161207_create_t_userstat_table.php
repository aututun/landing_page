<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTUserstatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_userstat', function (Blueprint $table) {
            $table->increments('Id');
            $table->char('userid', 64)->default('0');
            $table->integer('serverid')->default(0);
            $table->integer('eventid')->default(0);
            $table->integer('rectime')->default(0);
            $table->integer('loginnum')->default(0);

            $table->unique(['userid', 'serverid'], 'userid_serverid');
            $table->index('eventid');
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_userstat');
    }

}
