<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGuildTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_guild_task', function (Blueprint $table) {
            $table->integer('GuildID')->primary();
            $table->integer('TaskID')->nullable()->comment('ID nhiệm vụ của bang này');
            $table->integer('TaskValue')->nullable();
            $table->integer('DayCreate')->nullable();
            $table->integer('TaskCountInDay')->nullable()->comment('Nhiệm Vụ thứ mấy trong ngày');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_guild_task');
    }

}
