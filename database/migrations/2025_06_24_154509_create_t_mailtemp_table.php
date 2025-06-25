<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMailtempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_mailtemp', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('mailid')->default(0);
            $table->unsignedInteger('receiverrid')->default(0);
        });
    }

    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_mailtemp');
    }

}
