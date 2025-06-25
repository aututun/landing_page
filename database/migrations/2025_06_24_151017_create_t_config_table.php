<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_config', function (Blueprint $table) {
            $table->char('paramname', 32)->collation('utf8mb3_general_ci');
            $table->string('paramvalue', 255)->collation('utf8mb3_general_ci');

            $table->unique('paramname', 'paramname');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_config');
    }

}
