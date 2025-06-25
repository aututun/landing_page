<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_friends', function (Blueprint $table) {
            $table->id('Id');
            $table->integer('myid')->default(0);
            $table->integer('otherid')->default(0);
            $table->tinyInteger('friendType')->unsigned()->default(0);
            $table->integer('relationship')->nullable();
            $table->unique(['myid', 'otherid'], 'unique_mo');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_friends');
    }

}
