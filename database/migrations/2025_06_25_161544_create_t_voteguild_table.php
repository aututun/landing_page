<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTVoteguildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_voteguild', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('ZoneID')->nullable();
            $table->integer('GuildID')->nullable();
            $table->integer('RoleVote')->nullable();
            $table->integer('VoteCount')->nullable();
            $table->integer('WeekID')->nullable();
            $table->integer('RoleReviceVote')->nullable();
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_voteguild');
    }

}
