<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_money', function (Blueprint $table) {
            $table->char('userid', 64)->collation('utf8mb3_general_ci')->default('0');
            $table->unsignedInteger('money')->default(0);
            $table->unsignedInteger('realmoney')->default(0);
            $table->integer('giftid')->default(0);
            $table->integer('giftjifen')->default(0);
            $table->integer('points')->default(0);
            $table->integer('specjifen')->default(0);

            $table->unique('userid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_money');
    }

}
