<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTDayactivityinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_dayactivityinfo', function (Blueprint $table) {
            $table->integer('roleid')->default(0);
            $table->integer('activityid')->default(0);
            $table->integer('timeinfo');
            $table->integer('triggercount')->default(0);
            $table->unsignedBigInteger('totalpoint')->default(0);
            $table->dateTime('lastgettime')->default('1900-01-01 12:00:00');

            $table->primary(['roleid', 'activityid']);
            $table->unique(['roleid', 'activityid', 'timeinfo'], 'roleid_activity_timestr');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_dayactivityinfo');
    }

}
