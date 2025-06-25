<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPrenamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_prenames', function (Blueprint $table) {
            $table->char('name', 32)->collation('utf8mb3_general_ci');
            $table->tinyInteger('sex')->default(0);
            $table->tinyInteger('used')->default(0);

            $table->unique('name');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_prenames');
    }

}
