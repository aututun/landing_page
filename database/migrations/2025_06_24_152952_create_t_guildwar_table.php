<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGuildwarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_guildwar', function (Blueprint $table) {
            $table->integer('GuildID')->primary();
            $table->string('GuildName', 255)->nullable();
            $table->string('TeamList', 255)->nullable();
            $table->integer('WeekID')->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_guildwar');
    }
}
