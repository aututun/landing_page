<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTaskslogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_taskslog', function (Blueprint $table) {
            $table->integer('rid')->default(0)->index();
            $table->integer('taskid')->default(0);
            $table->unsignedInteger('count')->default(0);
            $table->integer('taskclass')->nullable();

            $table->unique(['rid', 'taskid'], 'taskid_rid');
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_taskslog');
    }

}
