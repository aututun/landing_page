<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerListsIosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ServerListsIos', function (Blueprint $table) {
            $table->increments('ID'); // Primary key
            $table->integer('nServerID')->unique(); // ID Server, có vẻ là một ID duy nhất
            $table->string('strServerName'); // Tên server
            // Có thể có các cột khác như IP, Port, Status...
            $table->timestamps(); // Thêm created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ServerListsIos');
    }
}