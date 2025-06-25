<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTKfTiantiRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_kf_tianti_role', function (Blueprint $table) {
            $table->unsignedInteger('rid')->primary();
            $table->unsignedTinyInteger('duanweiid');
            $table->unsignedInteger('duanweijifen');
            $table->unsignedInteger('duanweirank');
            $table->unsignedSmallInteger('liansheng');
            $table->unsignedSmallInteger('fightcount');
            $table->unsignedSmallInteger('successcount');
            $table->unsignedSmallInteger('todayfightcount');
            $table->unsignedSmallInteger('lastfightdayid');
            $table->unsignedInteger('monthduanweirank');
            $table->date('fetchmonthawarddate')->default('2001-11-11');
            $table->unsignedInteger('rongyao');
        });
    }

    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_kf_tianti_role');
    }

}
