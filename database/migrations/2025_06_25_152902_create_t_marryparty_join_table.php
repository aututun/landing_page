<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMarrypartyJoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_marryparty_join', function (Blueprint $table) {
            $table->integer('roleid')->default(0);
            $table->integer('partyroleid')->default(0);
            $table->integer('joincount')->nullable();

            $table->primary(['roleid', 'partyroleid']);
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_marryparty_join');
    }

}
