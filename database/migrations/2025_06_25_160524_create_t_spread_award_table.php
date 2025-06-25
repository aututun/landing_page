<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSpreadAwardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_spread_award', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zoneID')->nullable();
            $table->integer('roleID')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->string('state')->nullable();
            $table->unique(['zoneID', 'roleID', 'type'], 'dex_spread');
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_spread_award');
    }

}
