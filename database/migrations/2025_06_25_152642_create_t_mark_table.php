<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_mark', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('RoleID')->nullable();
            $table->string('TimeRanger', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->integer('MarkValue')->nullable();
            $table->integer('MarkType')->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_mark');
    }

}
