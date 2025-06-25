<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTLinpinmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_linpinma', function (Blueprint $table) {
            $table->char('lipinma', 32)->collation('utf8mb3_general_ci');
            $table->integer('huodongid')->default(0);
            $table->integer('maxnum')->default(0);
            $table->integer('usednum')->default(0);
            $table->integer('ptid')->default(0);
            $table->unsignedInteger('ptrepeat')->default(0);

            $table->unique('lipinma');
        });
    }

    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_linpinma');
    }

}
