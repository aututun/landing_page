<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTAdorationinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_adorationinfo', function (Blueprint $table) {
            $table->integer('roleid')->default(0);
            $table->integer('adorationroleid')->default(0);
            $table->integer('dayid');

            $table->primary(['roleid', 'adorationroleid'], 't_adorationinfo_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_adorationinfo');
    }
}
