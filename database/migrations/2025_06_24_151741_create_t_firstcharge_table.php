<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTFirstchargeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_firstcharge', function (Blueprint $table) {
            $table->char('uid', 64)->default('0');
            $table->char('charge_info', 128);
            $table->integer('notget');
            $table->primary('uid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_firstcharge');
    }

}
