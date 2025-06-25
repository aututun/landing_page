<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTWarningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_warning', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('rid')->default(0);
            $table->integer('usedmoney')->default(0);
            $table->integer('goodsmoney')->default(0);
            $table->dateTime('warningtime');
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_warning');
    }
}
