<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRoleparamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_roleparams', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->char('pname', 32)->collation('utf8mb3_general_ci');
            $table->char('pvalue', 128)->collation('utf8mb3_general_ci')->nullable();

            $table->unique(['rid', 'pname'], 'rid_pname');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_roleparams');
    }

}
