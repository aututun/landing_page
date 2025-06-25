<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTKfonlineawardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_kfonlineawards', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->integer('dayid')->default(0);
            $table->integer('yuanbao')->default(0);
            $table->integer('totalrolenum')->default(0);
            $table->integer('zoneid')->default(0);

            $table->unique(['dayid', 'zoneid'], 'dayid_zoneid');
        });
    }

    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_kfonlineawards');
    }

}
