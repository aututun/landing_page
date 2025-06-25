<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMarrypartyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_marryparty', function (Blueprint $table) {
            $table->integer('roleid')->default(0);
            $table->integer('partytype')->nullable();
            $table->integer('joincount')->nullable();
            $table->dateTime('starttime')->nullable();
            $table->integer('husbandid')->default(0);
            $table->integer('wifeid')->default(0);

            $table->primary('roleid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_marryparty');
    }

}
