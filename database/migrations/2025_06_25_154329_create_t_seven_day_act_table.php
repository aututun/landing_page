<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSevenDayActTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_seven_day_act', function (Blueprint $table) {
            $table->integer('roleid')->default(0);
            $table->integer('act_type')->default(0);
            $table->integer('id')->default(0);
            $table->integer('award_flag')->default(0);
            $table->integer('param1')->default(0);
            $table->integer('param2')->default(0);

            $table->primary(['roleid', 'act_type', 'id']);
            $table->index('roleid', 'key_roleid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_seven_day_act');
    }

}
