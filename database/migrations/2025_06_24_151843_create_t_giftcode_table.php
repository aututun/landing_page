<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGiftcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_giftcode', function (Blueprint $table) {
            $table->id('id');
            $table->char('userid', 64)->default('0');
            $table->integer('rid')->default(0);
            $table->string('giftid', 30)->nullable();
            $table->char('codeno', 8)->nullable();
            $table->dateTime('usetime')->nullable();
            $table->tinyInteger('mailid')->default(0);
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_giftcode');
    }

}
