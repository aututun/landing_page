<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGuildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_guild', function (Blueprint $table) {
            $table->increments('GuildID');
            $table->string('GuildName', 32)->nullable();
            $table->integer('MoneyBound')->nullable();
            $table->integer('MoneyStore')->nullable();
            $table->integer('ZoneID')->nullable();
            $table->string('Notify', 1000)->nullable();
            $table->integer('TotalTerritory')->nullable();
            $table->integer('MaxWithDraw')->nullable();
            $table->integer('Leader')->nullable();
            $table->dateTime('DateCreate')->nullable();
            $table->integer('MoneyBuild')->nullable();
            $table->string('FamilyMember', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_guild');
    }

}
