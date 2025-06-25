<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTEventrankingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_eventranking', function (Blueprint $table) {
            $table->integer('rid')->primary();
            $table->string('rname')->nullable();
            $table->integer('value')->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_eventranking');
    }

}
