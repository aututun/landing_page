<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRankingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_ranking', function (Blueprint $table) {
            $table->increments('rid');
            $table->string('rname', 200)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->integer('level')->nullable();
            $table->integer('occupation')->nullable();
            $table->integer('sub_id')->nullable();
            $table->integer('monphai')->nullable();
            $table->bigInteger('taiphu')->nullable();
            $table->integer('volam')->nullable();
            $table->integer('liendau')->nullable();
            $table->integer('uydanh')->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_ranking');
    }

}
