<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTUserReturnAwardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_user_return_award', function (Blueprint $table) {
            $table->integer('activityID')->default(0);
            $table->date('activityDay')->default('1900-01-01');
            $table->integer('zoneID')->default(0);
            $table->integer('roleID')->default(0);
            $table->tinyInteger('type')->default(0);
            $table->string('state', 255);

            $table->unique(['activityID', 'activityDay', 'roleID', 'zoneID', 'type'], 'time_uid_zoneID_idx');
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_user_return_award');
    }

}
