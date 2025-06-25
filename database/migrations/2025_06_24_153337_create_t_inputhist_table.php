<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTInputhistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_inputhist', function (Blueprint $table) {
            $table->unsignedInteger('Id')->default(0);
            $table->integer('lastid')->default(0);
            $table->primary('Id');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_inputhist');
    }

}
