<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPtbagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_ptbag', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->integer('extgridnum')->default(0);

            $table->unique('rid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_ptbag');
    }

}
