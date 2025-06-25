<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTHuodongawarduserhistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_huodongawarduserhist', function (Blueprint $table) {
            $table->char('userid', 64)->default('0');
            $table->unsignedInteger('activitytype')->default(0);
            $table->char('keystr', 128)->default('');
            $table->char('hasgettimes', 128)->default('0');
            $table->dateTime('lastgettime')->default('1900-01-01 12:00:00');
            $table->unique(['userid', 'activitytype', 'keystr'], 'uactkey');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_huodongawarduserhist');
    }

}
