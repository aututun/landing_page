<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSystemglobalvalueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_systemglobalvalue', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('value')->nullable();
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_systemglobalvalue');
    }

}
