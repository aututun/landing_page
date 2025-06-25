<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTDailydataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_dailydata', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->integer('expdayid')->default(0);
            $table->integer('todayexp')->default(0);
            $table->integer('linglidayid')->default(0);
            $table->integer('todaylingli')->default(0);
            $table->integer('killbossdayid')->default(0);
            $table->integer('todaykillboss')->default(0);
            $table->integer('fubendayid')->default(0);
            $table->integer('todayfubennum')->default(0);
            $table->integer('wuxingdayid')->default(0);
            $table->integer('wuxingnum')->default(0);

            $table->unique('rid', 'rid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_dailydata');
    }
}
