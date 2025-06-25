<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTerritoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_territory', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('MapID')->nullable();
            $table->string('MapName', 255)->nullable();
            $table->integer('GuildID')->nullable();
            $table->integer('Star')->nullable();
            $table->integer('Tax')->nullable();
            $table->integer('ZoneID')->nullable();
            $table->integer('IsMainCity')->nullable();
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_territory');
    }

}
