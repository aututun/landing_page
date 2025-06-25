<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTHuodongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_huodong', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->char('loginweekid', 32);
            $table->char('logindayid', 32);
            $table->integer('loginnum')->default(0);
            $table->integer('newstep')->default(0);
            $table->dateTime('steptime');
            $table->integer('lastmtime')->default(0);
            $table->char('curmid', 32);
            $table->integer('curmtime')->default(0);
            $table->integer('songliid')->default(0);
            $table->integer('logingiftstate')->default(0);
            $table->integer('onlinegiftstate')->default(0);
            $table->integer('lastlimittimehuodongid')->default(0);
            $table->integer('lastlimittimedayid')->default(0);
            $table->integer('limittimeloginnum')->default(0);
            $table->integer('limittimegiftstate')->default(0);
            $table->integer('everydayonlineawardstep')->default(0);
            $table->integer('geteverydayonlineawarddayid')->default(0);
            $table->integer('serieslogingetawardstep')->default(0);
            $table->integer('seriesloginawarddayid')->default(0);
            $table->char('seriesloginawardgoodsid', 255)->default('');
            $table->char('everydayonlineawardgoodsid', 255)->default('');
            $table->unique('rid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_huodong');
    }

}
