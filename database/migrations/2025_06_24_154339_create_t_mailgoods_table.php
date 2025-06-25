<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMailgoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_mailgoods', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('mailid')->default(0);
            $table->unsignedInteger('goodsid')->default(0);
            $table->unsignedInteger('forge_level')->default(1);
            $table->string('Props', 500)->collation('utf8mb3_general_ci')->default('');
            $table->unsignedInteger('gcount')->default(0);
            $table->unsignedInteger('binding')->default(0);
            $table->tinyInteger('series')->nullable();
            $table->string('otherpramer', 256)->collation('utf8mb3_general_ci')->nullable();
            $table->unsignedInteger('strong')->default(0);

            $table->primary('Id');
            $table->index('mailid');
        });
    }

    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_mailgoods');
    }

}
