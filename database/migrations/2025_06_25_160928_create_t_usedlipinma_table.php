<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTUsedlipinmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_usedlipinma', function (Blueprint $table) {
            $table->char('lipinma', 32);
            $table->integer('huodongid')->default(0);
            $table->integer('ptid')->default(0);
            $table->integer('rid')->default(0);

            $table->index('rid');
            $table->index('huodongid');
            $table->index('ptid');
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_usedlipinma');
    }

}
