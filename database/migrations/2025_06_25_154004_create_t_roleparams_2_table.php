<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRoleparams2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_roleparams_2', function (Blueprint $table) {
            $table->integer('rid');
            $table->char('pname', 32)->collation('ascii_general_ci');
            $table->string('pvalue', 50000)->collation('ascii_general_ci')->nullable();

            $table->primary(['rid', 'pname']);
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_roleparams_2');
    }

}
