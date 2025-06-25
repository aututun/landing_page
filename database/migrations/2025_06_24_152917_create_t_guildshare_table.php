<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGuildshareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_guildshare', function (Blueprint $table) {
            $table->id('ID');
            $table->integer('RoleID')->nullable();
            $table->float('Share')->nullable();
            $table->integer('GuildID')->nullable();
            $table->string('RoleName', 255)->nullable();
            $table->integer('Rank')->nullable();
            $table->integer('FamilyID')->nullable();
            $table->string('FamilyName', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_guildshare');
    }

}
