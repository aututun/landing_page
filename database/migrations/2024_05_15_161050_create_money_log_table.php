<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MoneyLog', function (Blueprint $table) {
            $table->id();
            $table->integer('UserID');
            $table->integer('ServerID');
            $table->bigInteger('KTCoin');
            $table->bigInteger('KTCoinBefore');
            $table->bigInteger('KTCoinAfter');
            $table->timestamp('AddedDate')->default(date_format(now(),"Y/m/d H:i:s"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MoneyLog');
    }
}
