<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTLimitgoodsbuyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_limitgoodsbuy', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->unsignedInteger('goodsid')->default(0);
            $table->unsignedInteger('dayid')->default(0);
            $table->unsignedInteger('usednum')->default(0);

            $table->unique(['rid', 'goodsid'], 'rid_goodsid');
        });
    }

    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_limitgoodsbuy');
    }

}
