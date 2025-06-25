<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_order', function (Blueprint $table) {
            $table->increments('Id')->unsigned();
            $table->char('order_no', 64)->collation('utf8mb3_general_ci');
            $table->unique('order_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_order');
    }
}
