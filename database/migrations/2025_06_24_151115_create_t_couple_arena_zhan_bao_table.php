<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCoupleArenaZhanBaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_couple_arena_zhan_bao', function (Blueprint $table) {
            $table->id(); // AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('union_couple')->default(0);
            $table->integer('man_rid')->default(0);
            $table->integer('wife_rid')->default(0);
            $table->integer('to_man_rid')->default(0);
            $table->integer('to_man_zoneid')->default(0);
            $table->char('to_man_rname', 32)->nullable()->collation('utf8mb3_general_ci');
            $table->integer('to_wife_rid')->default(0);
            $table->integer('to_wife_zoneid')->default(0);
            $table->char('to_wife_rname', 32)->nullable()->collation('utf8mb3_general_ci');
            $table->tinyInteger('is_win')->default(0);
            $table->integer('get_jifen')->default(0);
            $table->integer('week')->default(0);
            $table->dateTime('time');

            $table->index('union_couple', 'key_union_couple');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_couple_arena_zhan_bao');
    }

}
