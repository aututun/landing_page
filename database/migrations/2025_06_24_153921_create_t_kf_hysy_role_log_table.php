<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTKfHysyRoleLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_kf_hysy_role_log', function (Blueprint $table) {
            $table->integer('rid');
            $table->date('day');
            $table->integer('zoneid')->default(0);
            $table->smallInteger('signup_count')->default(0);
            $table->smallInteger('start_game_count')->default(0);
            $table->smallInteger('success_count')->default(0);
            $table->smallInteger('faild_count')->default(0);

            $table->primary(['rid', 'day']);
        });
    }

    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_kf_hysy_role_log');
    }

}
