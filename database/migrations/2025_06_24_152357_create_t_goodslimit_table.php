<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGoodslimitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_goodslimit', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->integer('goodsid')->default(0);
            $table->integer('dayid')->default(0);
            $table->integer('usednum')->default(0);

            $table->unique(['rid', 'goodsid'], 'rid_goodsid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_goodslimit');
    }

}
