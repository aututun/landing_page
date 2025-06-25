<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGoodspropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_goodsprops', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('rid');
            $table->integer('type');
            $table->char('props', 255);
            $table->integer('isdel')->default(0);

            $table->primary(['id', 'rid', 'type']);
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_goodsprops');

    }
}
