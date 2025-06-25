<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_family', function (Blueprint $table) {
            $table->id('FamilyID');
            $table->string('FamilyName', 200)->nullable();
            $table->integer('Leader')->nullable();
            $table->string('Notify', 1000)->nullable();
            $table->dateTime('DateCreate')->nullable();
            $table->string('RequestNotify', 5000)->nullable();
            $table->integer('FamilyMoney')->nullable();
            $table->integer('WeeklyFubenCount')->nullable();
            $table->integer('FamilyZoneID')->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_family');
    }

}
