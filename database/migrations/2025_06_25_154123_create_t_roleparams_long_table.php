<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRoleparamsLongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_roleparams_long', function (Blueprint $table) {
            $table->integer('rid');
            $table->integer('idx');

            for ($i = 0; $i <= 39; $i++) {
                $table->bigInteger("v{$i}")->default(0);
            }

            $table->primary(['rid', 'idx']);
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_roleparams_long');
    }

}
