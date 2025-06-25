<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTUserReturnBackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_user_return_back', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activityID')->default(0);
            $table->date('activityDay')->default('1900-01-01');
            $table->integer('pzoneID')->default(0);
            $table->integer('proleID')->default(0);
            $table->integer('czoneID')->default(0);
            $table->integer('croleID')->default(0);
            $table->integer('vip')->default(0);
            $table->integer('level')->default(0);
            $table->dateTime('logTime')->default('1900-01-01 00:00:00');
            $table->integer('checkState')->default(0);
            $table->integer('logState')->default(0);

            $table->unique(['activityID', 'activityDay', 'croleID', 'checkState', 'logState'], 'idx_user_return');
            $table->index('logState', 'idx_logState');
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_user_return_back');
    }

}
