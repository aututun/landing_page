<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_login', function (Blueprint $table) {
            $table->string('userid', 64)->collation('utf8mb3_general_ci');
            $table->integer('dayid')->default(0)->nullable();
            $table->bigInteger('rid');
            $table->dateTime('logintime')->nullable()->index();
            $table->dateTime('logouttime')->nullable();
            $table->string('ip', 16)->nullable();
            $table->string('mac', 30)->nullable();
            $table->mediumInteger('zoneid')->nullable();
            $table->mediumInteger('onlinesecs')->default(0)->nullable();
            $table->mediumInteger('loginnum')->default(0)->nullable();
            $table->string('c1', 64)->nullable();
            $table->string('c2', 64)->nullable();

            $table->unique(['userid', 'dayid', 'ip'], 'userid_dayid_ip');
        });
    }

    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_login');
    }

}
