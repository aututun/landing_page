<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTempmoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_tempmoney', function (Blueprint $table) {
            $table->id('id');
            $table->char('uid', 64);
            $table->integer('addmoney')->default(0);
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_tempmoney');
    }

}
