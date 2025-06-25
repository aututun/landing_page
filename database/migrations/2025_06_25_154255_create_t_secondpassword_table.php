<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSecondpasswordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_secondpassword', function (Blueprint $table) {
            $table->string('userid', 64)->primary();
            $table->string('secpwd', 32)->default('');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_secondpassword');
    }

}
