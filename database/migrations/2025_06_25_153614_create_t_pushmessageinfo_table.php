<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPushmessageinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_pushmessageinfo', function (Blueprint $table) {
            $table->char('userid', 64)->collation('utf8mb3_general_ci');
            $table->char('pushid', 64)->collation('utf8mb3_general_ci');
            $table->dateTime('lastlogintime')->default('1900-01-01 12:00:00');

            $table->primary('userid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_pushmessageinfo');
    }

}
