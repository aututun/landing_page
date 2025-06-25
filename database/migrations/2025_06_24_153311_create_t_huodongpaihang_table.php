<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTHuodongpaihangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_huodongpaihang', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->char('rname', 32)->nullable();
            $table->integer('zoneid')->default(0);
            $table->unsignedTinyInteger('type')->default(0);
            $table->unsignedTinyInteger('paihang')->default(0);
            $table->unsignedInteger('phvalue')->default(0);
            $table->dateTime('paihangtime')->default('1900-01-01 12:00:00');
            $table->index('rid', 'rid_idx');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_huodongpaihang');
    }

}
