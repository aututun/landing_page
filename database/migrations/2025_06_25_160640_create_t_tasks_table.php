<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_tasks', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('taskid')->default(0);
            $table->integer('rid')->default(0)->index();
            $table->unsignedInteger('focus')->default(0);
            $table->unsignedInteger('value1')->default(0);
            $table->unsignedInteger('value2')->default(0);
            $table->unsignedTinyInteger('isdel')->default(0);
            $table->dateTime('addtime');
            $table->integer('starlevel')->default(0);
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_tasks');
    }

}
