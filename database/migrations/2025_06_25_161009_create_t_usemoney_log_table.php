<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTUsemoneyLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_usemoney_log', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('DBId')->nullable();
            $table->string('userid', 64)->nullable();
            $table->string('ObjName', 255)->nullable();
            $table->string('optFrom', 255)->nullable();
            $table->string('currEnvName', 255)->nullable();
            $table->string('tarEnvName', 255)->nullable();
            $table->char('optType', 6)->nullable();
            $table->dateTime('optTime')->nullable();
            $table->integer('optAmount')->nullable();
            $table->integer('zoneID')->nullable();
            $table->integer('optSurplus')->nullable();

            $table->index('DBId');
            $table->index('tarEnvName');
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_usemoney_log');
    }

}
