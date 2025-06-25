<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGroupmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_groupmail', function (Blueprint $table) {
            $table->integer('gmailid');
            $table->string('subject', 100);
            $table->string('content', 255);
            $table->string('conditions', 100);
            $table->dateTime('inputtime');
            $table->dateTime('endtime');
            $table->integer('yinliang')->default(0);
            $table->integer('tongqian')->default(0);
            $table->integer('yuanbao')->default(0);
            $table->string('goodlist', 200);

            $table->primary('gmailid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_groupmail');
    }

}
