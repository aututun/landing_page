<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBufferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_buffer', function (Blueprint $table) {
            $table->id(); // PRIMARY KEY AUTO_INCREMENT
            $table->integer('rid')->default(0);
            $table->integer('bufferid')->default(0);
            $table->bigInteger('starttime')->default(0);
            $table->bigInteger('buffersecs')->default(0);
            $table->bigInteger('bufferval')->default(0);
            $table->string('custom_property', 255)->nullable()->collation('utf8mb3_general_ci');

            $table->unique(['rid', 'bufferid'], 'rid_bufferid');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_game')->dropIfExists('t_buffer');
    }
}
