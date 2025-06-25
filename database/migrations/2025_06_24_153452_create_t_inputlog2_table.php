<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTInputlog2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_inputlog2', function (Blueprint $table) {
            $table->increments('Id')->unsigned()->zerofill();
            $table->unsignedInteger('amount')->default(0);
            $table->char('u', 64)->collation('utf8mb3_general_ci')->default('0');
            $table->char('order_no', 64)->collation('utf8mb3_general_ci');
            $table->char('cporder_no', 64)->collation('utf8mb3_general_ci');
            $table->unsignedInteger('time')->default(0);
            $table->char('sign', 32)->collation('utf8mb3_general_ci');
            $table->dateTime('inputtime');
            $table->char('result', 32)->collation('utf8mb3_general_ci');
            $table->integer('zoneid')->default(0);

            $table->primary('Id');
            $table->index('inputtime');
            $table->index(['inputtime', 'u', 'zoneid', 'result'], 'query_money');
            $table->index('u', 'uid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_inputlog2');
    }

}
