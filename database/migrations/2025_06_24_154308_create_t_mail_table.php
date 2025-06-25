<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_mail', function (Blueprint $table) {
            $table->increments('mailid');
            $table->integer('senderrid')->default(0);
            $table->string('senderrname', 256)->nullable()->collation('utf8mb3_general_ci');
            $table->dateTime('sendtime')->default('1900-01-01 12:00:00');
            $table->integer('receiverrid')->default(0);
            $table->string('reveiverrname', 256)->nullable()->collation('utf8mb3_general_ci');
            $table->dateTime('readtime')->default('1900-01-01 12:00:00');
            $table->unsignedTinyInteger('isread')->default(0);
            $table->unsignedTinyInteger('mailtype')->default(0);
            $table->unsignedTinyInteger('hasfetchattachment')->default(0);
            $table->string('subject', 256)->nullable()->collation('utf8mb3_general_ci');
            $table->string('content', 10000)->collation('utf8mb3_general_ci');
            $table->unsignedInteger('bound_money')->default(0);
            $table->unsignedInteger('bound_token')->default(0);
            $table->unsignedInteger('money')->default(0);
            $table->unsignedInteger('token')->default(0);

            $table->index('receiverrid');
            $table->index('senderrid', 'senderrid_idx');
        });
    }

    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_mail');
    }

}
