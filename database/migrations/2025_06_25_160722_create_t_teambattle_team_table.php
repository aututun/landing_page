<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTeambattleTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_teambattle_team', function (Blueprint $table) {
            $table->id('aid');
            $table->dateTime('last_win_time')->nullable();
            $table->integer('has_awards')->default(0);
            $table->integer('stage');
            $table->integer('total_battles');
            $table->integer('point');
            $table->dateTime('register_time');
            $table->integer('member_4_id')->default(-1);
            $table->integer('member_3_id')->default(-1);
            $table->integer('member_2_id')->default(-1);
            $table->integer('member_1_id')->default(-1);
            $table->string('name', 255);
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_teambattle_team');
    }
}
